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
 * This file is part of the Local Login plugin for Moodle. It displays a login form and
 * passes the form submission to Moodle's own login form. If the user is already logged in,
 * it prevents re-logging in to avoid accidental session key changes.
 *
 * @package    local_login
 * @copyright  2019-2024 TNG Consulting Inc. - www.tngconsulting.ca
 * @author     Michael Milette
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Include config.php.
require_once(__DIR__ . '/../../config.php');

$context = context_system::instance();
$PAGE->set_url("$CFG->wwwroot/local/login/");
$PAGE->set_context($context);
$PAGE->set_pagelayout('login');
$logintitle = get_string('login');
$PAGE->set_title("$SITE->fullname: $logintitle");
$PAGE->set_heading("$SITE->fullname");

if (false) {
    require_login();
}

echo $OUTPUT->header();

if (isloggedin() && !isguestuser()) {
    // Prevent logging when already logged in, we do not want them to relogin by accident because sesskey would be changed.
    $logout = new single_button(
        new moodle_url('/login/logout.php', ['sesskey' => sesskey(), 'loginpage' => 1]),
        get_string('logout'),
        'post'
    );
    $continue = new single_button(new moodle_url('/'), get_string('cancel'), 'get');
    echo $OUTPUT->confirm(get_string('alreadyloggedin', 'error', fullname($USER)), $logout, $continue);
} else {
    $form = new stdClass();
    $form->wwwroot = $CFG->wwwroot;
    $form->username = '';
    $form->forgotpasswordurl = "{$CFG->wwwroot}/login/forgot_password.php";
    $form->sitename = $SITE->fullname;
    $form->loginurl = "$CFG->wwwroot/login/index.php";
    $form->logintoken = s(\core\session\manager::get_login_token());
    $form->passwordautocomplete = false;
    $form->rememberusername = false;
    $form->cookieshelpiconformatted = '.';

    $output = $PAGE->get_renderer('core');
    echo $output->render_from_template('local_login/login_form', $form);
}

echo $OUTPUT->footer();
