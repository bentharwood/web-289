<?php require_once('../../private/initialize.php');
require_login();
require_level(1);
$id = $_GET['id'] ?? '1';

$user = users::find_by_id($id);

$page_title = 'Show user: ' . h($user->full_name());
include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('admin/admin_index.php'); ?>">&laquo; Back to Admin hub</a>

  <div class="user show">

    <h1>user: <?php echo h($user->full_name()); ?></h1>

    <div class="attributes">
      <dl>
        <dt>First name</dt>
        <dd><?php echo h($user->first_name_usr); ?></dd>
      </dl>
      <dl>
        <dt>Last name</dt>
        <dd><?php echo h($user->last_name_usr); ?></dd>
      </dl>
      <dl>
        <dt>Email</dt>
        <dd><?php echo h($user->email_usr); ?></dd>
      </dl>
      <dl>
        <dt>Username</dt>
        <dd><?php echo h($user->username_usr); ?></dd>
      </dl>
      <dl>
        <dt>Address</dt>
        <dd><?php echo h($user->address_usr); ?></dd>
      </dl>
      <dl>
        <dt>City</dt>
        <dd><?php echo h($user->city_usr); ?></dd>
      </dl>
      <dl>
        <dt>Status</dt>
        <dd><?php echo ($user->user_level_usr == 1) ? "admin" : "user"; ?></dd>
      </dl>





    </div>

  </div>

</div>