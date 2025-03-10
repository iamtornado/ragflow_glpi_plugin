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

class PluginRagflowAssistant extends CommonGLPI {
   
   static $rightname = 'plugin_ragflow_assistant';

   /**
    * Get name of this type by language of the user connected
    *
    * @param integer $nb number of elements
    * @return string name of this type
    */
   static function getTypeName($nb = 0) {
      return __('AI Assistant', 'ragflow');
   }

   /**
    * Get menu name
    * 
    * @return string
    */
   static function getMenuName() {
      return __('AI Assistant', 'ragflow');
   }

   /**
    * Get menu content
    * 
    * @return array
    */
   static function getMenuContent() {
      $menu = [];

      $menu = [
         'title' => self::getMenuName(),
         'page'  => '/plugins/ragflow/front/assistant.php',
         'icon'  => self::getIcon()
      ];

      if (Session::haveRight('config', UPDATE)) {
         $menu['options']['config'] = [
            'title' => __('Configuration'),
            'page'  => '/plugins/ragflow/front/config.form.php',
            'icon'  => 'ti ti-settings'
         ];
      }

      return $menu;
   }

   /**
    * Get the icon for the menu
    * 
    * @return string
    */
   static function getIcon() {
      return "ti ti-robot";
   }

   /**
    * Show assistant interface
    */
   function showForm() {
      $config = PluginRagflowConfig::getConfig();
      $iframe_code = PluginRagflowConfig::getIframeCode();

      if (!$iframe_code) {
         echo "<div class='center'>";
         echo "<p class='red'>" . __('RagFlow AI Assistant is not configured yet. Please configure it first.', 'ragflow') . "</p>";
         if (Session::haveRight('config', UPDATE)) {
            echo "<p><a href='./config.form.php' class='btn btn-primary'>" . 
                 __('Configure RagFlow', 'ragflow') . "</a></p>";
         }
         echo "</div>";
         return false;
      }

      $height = isset($config['frame_height']) ? intval($config['frame_height']) : 600;
      echo "<div class='ragflow-assistant-container' style='height: {$height}px;'>";
      echo $iframe_code;
      echo "</div>";
      
      return true;
   }
} 