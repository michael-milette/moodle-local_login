<?php
// This file is part of Local Login for Moodle - https://moodle.org/
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
// along with Local Login.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Displays a login form and passes the form submission to Moodle's own login form.
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

echo $OUTPUT->header();

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
<section>
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-12">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div classss="col-md-12 col-lg-11 d-flex align-items-center">
                            <div class="card-body text-black">
                                <form action="<?php echo $form->loginurl; ?>" method="post" id="locallogin" <?php if (!$form->passwordautocomplete) echo ' autocomplete="off"'; ?>>
                                    <input id="anchor" type="hidden" name="anchor" value="<?php echo $form->wwwroot; ?>">
                                    <script>document.getElementById('anchor').value = location.hash;</script>
                                    <input type="hidden" name="logintoken" value="<?php echo s(\core\session\manager::get_login_token()); ?>">
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <h1 class="h1 fw-bold mb-4"><?php echo get_string('loginsite'); ?></h1>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" id="username"><?php echo get_string('username'); ?></label>
                                        <input type="text" name="username" id="username" class="form-control form-control-lg" required <?php if(!$form->passwordautocomplete) echo ' autocomplete="username"'; ?>>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" id="password"><?php echo get_string('password'); ?></label>
                                        <input type="password" name="password" id="password" class="form-control form-control-lg" required <?php if(!$form->passwordautocomplete) echo ' autocomplete="current-password"'; ?>>
                                    </div>
                                    <div class="pt-1 mb-4">
                                        <input type="submit" value="<?php echo get_string('login'); ?>" class="btn btn-primary btn-lg btn-block ml-0" id="loginbtn">
                                    </div>
                                    <p class="mb-0"><a class="small text-muted" href="<?php echo $form->forgotpasswordurl . '">' . get_string('forgotten'); ?></a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}

echo $OUTPUT->footer();
