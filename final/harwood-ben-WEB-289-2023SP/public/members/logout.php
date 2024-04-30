<?php
require_once('../../private/initialize.php');

// Log out
$session->logout();

redirect_to(url_for('/members/login.php'));

?>
