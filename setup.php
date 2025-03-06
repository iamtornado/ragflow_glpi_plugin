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

define('PLUGIN_RAGFLOW_VERSION', '1.0.0');

/**
 * Init hooks of the plugin.
 * REQUIRED
 *
 * @return void
 */
function plugin_init_ragflow() {
   global $PLUGIN_HOOKS;
   
   $PLUGIN_HOOKS['csrf_compliant']['ragflow'] = true;

   // Register class
   Plugin::registerClass('PluginRagflowAssistant');

   // Add menu entry in assistance
   $PLUGIN_HOOKS['menu_toadd']['ragflow'] = [
      'tools' => 'PluginRagflowAssistant'
   ];
}

/**
 * Get the name and the version of the plugin
 * REQUIRED
 *
 * @return array
 */
function plugin_version_ragflow() {
   return [
      'name'           => 'RagFlow',
      'version'        => PLUGIN_RAGFLOW_VERSION,
      'author'        => 'Your Name',
      'license'        => 'GPLv3+',
      'homepage'       => '',
      'requirements'   => [
         'glpi' => [
            'min' => '10.0.0',
            'max' => '10.0.99',
            'dev' => false
         ]
      ]
   ];
}

/**
 * Check pre-requisites before install
 * REQUIRED
 *
 * @return boolean
 */
function plugin_ragflow_check_prerequisites() {
   if (version_compare(GLPI_VERSION, '10.0.0', 'lt') || version_compare(GLPI_VERSION, '10.1.0', 'ge')) {
      echo "This plugin requires GLPI >= 10.0.0 and < 10.1.0";
      return false;
   }
   return true;
}

/**
 * Check configuration process
 *
 * @return boolean
 */
function plugin_ragflow_check_config() {
   return true;
}