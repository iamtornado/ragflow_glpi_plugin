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

Session::checkLoginUser();

Html::header(
   __('AI Assistant', 'ragflow'),
   $_SERVER['PHP_SELF'],
   'tools',
   'PluginRagflowAssistant'
);

$assistant = new PluginRagflowAssistant();
$assistant->showForm();

Html::footer(); 