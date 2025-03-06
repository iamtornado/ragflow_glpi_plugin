<?php
/**
 * ---------------------------------------------------------------------
 * RagFlow Plugin for GLPI
 * ---------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of RagFlow.
 *
 * RagFlow is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * RagFlow is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with RagFlow. If not, see <http://www.gnu.org/licenses/>.
 * ---------------------------------------------------------------------
 */

class PluginRagflowConfig extends CommonDBTM {
   
   static private $_instance = null;
   static $rightname = 'config';

   /**
    * Get config values
    *
    * @param boolean $force force reload (don't use cache)
    * @return array
    */
   public static function getConfig($force = false) {
      static $config = null;

      if ($force || $config === null) {
         $config = Config::getConfigurationValues('plugin:ragflow');
      }

      return $config;
   }

   /**
    * Get an instance of the configuration class
    * 
    * @return PluginRagflowConfig
    */
   static function getInstance() {
      if (!isset(self::$_instance)) {
         self::$_instance = new self();
      }
      return self::$_instance;
   }

   /**
    * Show configuration form
    *
    * @return void
    */
   function showConfigForm() {
      global $CFG_GLPI;

      if (!Session::haveRight('config', UPDATE)) {
         return false;
      }

      $config = self::getConfig();

      echo "<form name='form' action='".Toolbox::getItemTypeFormURL(__CLASS__)."' method='post'>";
      echo "<div class='center' id='tabsbody'>";
      echo "<table class='tab_cadre_fixe'>";
      
      echo "<tr><th colspan='4'>" . __('RagFlow Configuration', 'ragflow') . "</th></tr>";

      // Iframe code
      echo "<tr class='tab_bg_1'>";
      echo "<td colspan='4'>";
      echo "<label for='iframe_code'>" . __('Iframe Code (Required)', 'ragflow') . "</label><br>";
      echo "<textarea name='iframe_code' id='iframe_code' cols='100' rows='10' required>";
      echo isset($config['iframe_code']) ? htmlspecialchars($config['iframe_code']) : '';
      echo "</textarea>";
      echo "<br><small>" . __('Please enter the complete iframe code for RagFlow AI Assistant', 'ragflow') . "</small>";
      echo "</td>";
      echo "</tr>";

      // Height
      echo "<tr class='tab_bg_1'>";
      echo "<td>";
      echo "<label for='frame_height'>" . __('Frame Height (px)', 'ragflow') . "</label>";
      echo "</td>";
      echo "<td>";
      echo "<input type='number' name='frame_height' id='frame_height' value='" . 
           (isset($config['frame_height']) ? $config['frame_height'] : '600') . "'>";
      echo "</td>";
      echo "</tr>";

      // Submit button
      echo "<tr class='tab_bg_2'>";
      echo "<td colspan='4' class='center'>";
      echo "<input type='submit' name='update' class='submit' value='" . 
           __('Save', 'ragflow') . "'>";
      echo "</td>";
      echo "</tr>";

      echo "</table>";
      echo "</div>";
      Html::closeForm();
   }

   /**
    * Save configuration
    *
    * @param array $values
    * @return boolean
    */
   static function saveConfig($values = []) {
      if (!Session::haveRight('config', UPDATE)) {
         return false;
      }

      // Validate required iframe code
      if (!isset($values['iframe_code']) || empty(trim($values['iframe_code']))) {
         Session::addMessageAfterRedirect(
            __('Iframe code is required', 'ragflow'),
            false,
            ERROR
         );
         return false;
      }

      $config = Config::getConfigurationValues('plugin:ragflow');
      $config = array_merge($config, $values);

      // Clean and validate iframe code
      if (isset($config['iframe_code'])) {
         // Remove any HTML entities and then re-encode special characters
         $iframe_code = html_entity_decode($config['iframe_code'], ENT_QUOTES | ENT_HTML5, 'UTF-8');
         $iframe_code = strip_tags($iframe_code, '<iframe>');
         
         // Validate that it contains an iframe tag
         if (!preg_match('/<iframe[^>]*>/', $iframe_code)) {
            Session::addMessageAfterRedirect(
               __('Invalid iframe code. Please enter a valid iframe tag.', 'ragflow'),
               false,
               ERROR
            );
            return false;
         }

         // Extract src URL
         if (preg_match('/src=["\']([^"\']+)["\']/', $iframe_code, $matches)) {
            $src = $matches[1];
            // Store only the URL, we'll reconstruct the iframe with proper attributes
            $config['iframe_code'] = $src;
         } else {
            Session::addMessageAfterRedirect(
               __('Invalid iframe code. Missing src attribute.', 'ragflow'),
               false,
               ERROR
            );
            return false;
         }
      }

      // Validate height
      if (isset($config['frame_height'])) {
         $config['frame_height'] = max(300, min(2000, intval($config['frame_height'])));
      }

      Config::setConfigurationValues('plugin:ragflow', $config);
      return true;
   }

   /**
    * Get iframe code from configuration
    * 
    * @return string|null
    */
   static function getIframeCode() {
      $config = self::getConfig();
      if (!isset($config['iframe_code'])) {
         return null;
      }

      // Construct iframe with all necessary attributes
      return "<iframe 
         src='" . htmlspecialchars($config['iframe_code'], ENT_QUOTES) . "'
         style='width: 100%; height: 100%; min-height: " . 
         (isset($config['frame_height']) ? intval($config['frame_height']) : 600) . "px'
         allow='clipboard-write'
         allowfullscreen='true'
         frameborder='0'>
      </iframe>";
   }
} 