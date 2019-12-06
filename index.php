<?php
// This file is part of Local Login for Moodle - http://moodle.org/
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
// along with Local Login.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Displays a login form and passes the form submission to Moodle's own login form.
 *
 * @package    local_login
 * @copyright  2019 TNG Consulting Inc. - www.tngconsulting.ca
 * @author     Michael Milette
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Include config.php.
require_once(__DIR__ . '/../../config.php');

$context = context_system::instance();
$PAGE->set_url("$CFG->wwwroot/local/login/");
$PAGE->set_context($context);
$PAGE->set_pagelayout('login');
$loginsite = get_string("loginsite");
$PAGE->set_title("$SITE->fullname: $loginsite");
$PAGE->set_heading("$SITE->fullname");

echo $OUTPUT->header();

echo $OUTPUT->box_start();
if (isloggedin() and !isguestuser()) {
    // prevent logging when already logged in, we do not want them to relogin by accident because sesskey would be changed
    $logout = new single_button(new moodle_url('/login/logout.php', array('sesskey'=>sesskey(),'loginpage'=>1)), get_string('logout'), 'post');
    $continue = new single_button(new moodle_url('/'), get_string('cancel'), 'get');
    echo $OUTPUT->confirm(get_string('alreadyloggedin', 'error', fullname($USER)), $logout, $continue);
} else {
    $form = new stdClass();
    $form->wwwroot = $CFG->wwwroot;
    $form->username = '';
    $form->forgotpasswordurl = "{$CFG->wwwroot}/login/forgot_password.php";
    $form->sitename = $SITE->fullname;
    $form->loginurl = "$CFG->wwwroot/login/index.php";
    $form->passwordautocomplete = false;
    $form->rememberusername = false;
    $form->cookieshelpiconformatted = '.';
?>
    <div class="loginpanel">
        <h2><?php echo get_string('login'); ?></h2>

        <div class="subcontent loginsub">
            <form action="<?php echo $form->loginurl; ?>" method="post" id="login"<?php if(!$form->passwordautocomplete) echo ' autocomplete="off"'; ?>>
                <div class="loginform">
                    <input id="anchor" type="hidden" name="anchor" value="<?php echo $form->wwwroot; ?>">
                    <script>document.getElementById('anchor').value = location.hash;</script>
                    <input type="hidden" name="logintoken" value="<?php echo s(\core\session\manager::get_login_token()); ?>">
                    <div class="form-group">
                        <div class="form-label"><label for="username"><?php echo get_string('username'); ?></label></div>
                        <div class="form-input"><input type="text" name="username" id="username" size="15" value="<?php echo $form->username; ?>"<?php if(!$form->passwordautocomplete) echo ' autocomplete="username"'; ?>></div>
                    </div>
                    <div class="clearer"></div>
                    <div class="form-group">
                        <div class="form-label"><label for="password"><?php echo get_string('password'); ?></label></div>
                        <div class="form-input"><input type="password" name="password" id="password" size="15" value=""<?php if(!$form->passwordautocomplete) echo ' autocomplete="current-password"'; ?>></div>
                    </div>
                </div>

                <div class="clearer"><!-- --></div>
                <?php if($form->rememberusername) { ?>
                    <div class="rememberpass mt-3">
                        <input type="checkbox" name="rememberusername" id="rememberusername" value="1"<?php if($form->username) echo ' checked="checked"';?>>
                        <label for="rememberusername"><?php echo get_string('rememberusername', 'admin'); ?></label>
                    </div>
                <?php } ?>
                <div class="clearer"><!-- --></div>
                <input id="anchor" type="hidden" name="anchor" value="" />
                <script>document.getElementById('anchor').value = location.hash;</script>
                <button type="submit" class="btn btn-primary" id="loginbtn">Log in</button>
                <div class="forgetpass">
                    <a href="<?php echo $form->forgotpasswordurl . '">' . get_string('forgotten'); ?></a>
                </div>
            </form>

            <div class="desc">
                <?php echo get_string('cookiesenabled') . $form->cookieshelpiconformatted; ?>
            </div>

        </div>
    </div>
<?php
}
echo $OUTPUT->box_end();

echo $OUTPUT->footer();
