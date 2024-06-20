<?php
// This file is part of the Local Login plugin for Moodle - https://moodle.org/
//
// Local Login is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Local Login is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Version information for Local Login.
 *
 * @package    local_login
 * @copyright  2019-2024 TNG Consulting Inc. - www.tngconsulting.ca
 * @author     Michael Milette
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'local_login'; // To check on upgrade, that module sits in correct place.
$plugin->version   = 2024061900;    // The current module version (Date: YYYYMMDDXX).
$plugin->requires  = 2019052000;    // Requires Moodle version 3.7.
$plugin->release   = '0.5';
$plugin->maturity  = MATURITY_BETA;
$plugin->cron      = 0;
