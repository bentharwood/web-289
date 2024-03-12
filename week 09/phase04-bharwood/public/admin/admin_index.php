<?php require_once('../../private/initialize.php');
require_login();
require_level(1);


$page_title = 'Our Farms';
include(SHARED_PATH . '/public_header.php');
?>
<h1>Welcome, <?php echo $session->username_usr ?></h1>
<ul>
  <li><a href="<?php echo url_for('admin/manage.php')?>">Manage users</a></li>
</ul>
