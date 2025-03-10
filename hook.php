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

/**
 * Plugin install process
 *
 * @return boolean
 */
function plugin_ragflow_install() {
   // Initialize default configuration with only height
   Config::setConfigurationValues('plugin:ragflow', [
      'frame_height' => 600
   ]);

   return true;
}

/**
 * Plugin uninstall process
 *
 * @return boolean
 */
function plugin_ragflow_uninstall() {
   // Remove plugin configuration
   Config::deleteConfigurationValues('plugin:ragflow', ['iframe_code', 'frame_height']);

   return true;
}