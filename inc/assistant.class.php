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
      echo "<div class='ragflow-assistant-container' style='height: 100vh;'>";
      echo "<iframe
               src='http://10.65.37.239:31291/chat/share?shared_id=786f49d8f82511ef8dc9000000a54663&from=chat&auth=hmNWZkNzlhZmE1ODExZWY4ZTQzMDAwMD'
               style='width: 100%; height: 100%; min-height: 600px'
               frameborder='0'>
            </iframe>";
      echo "</div>";
      
      return true;
   }
} 