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

include ('../../../inc/includes.php');

Session::checkRight("config", UPDATE);

// Save configuration if submitted
if (isset($_POST['update'])) {
   PluginRagflowConfig::saveConfig($_POST);
   Session::addMessageAfterRedirect(__('Configuration saved successfully', 'ragflow'));
   Html::back();
}

// Display the configuration form
Html::header(
   __('RagFlow Configuration', 'ragflow'),
   $_SERVER['PHP_SELF'],
   'config',
   'PluginRagflowConfig'
);

$config = new PluginRagflowConfig();
$config->showConfigForm();

Html::footer(); 