<?php require_once('../../private/initialize.php');
require_login();
require_level(1);

$users = users::find_all();
$page_title = 'manage';
include(SHARED_PATH . '/public_header.php');
?>

<div id="content">
  <div class="user listing">
    <h1>users</h1>
    <a href="<?php echo url_for('admin/create_user.php') ?>">Create a new user</a>

    <table>
      <tr>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Email</th>
        <th>Username</th>
        <th>address</th>
        <th>city</th>
        <th>admin</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($users as $user) { ?>
        <tr>
          <td><?php echo h($user->id_usr); ?></td>
          <td><?php echo h($user->first_name_usr); ?></td>
          <td><?php echo h($user->last_name_usr); ?></td>
          <td><?php echo h($user->email_usr); ?></td>
          <td><?php echo h($user->username_usr); ?></td>
          <td><?php echo h($user->address_usr); ?></td>
          <td><?php echo h($user->city_usr); ?></td>
          <td><?php echo h($user->user_level_usr == 1) ? "admin" : "user";  ?></td>
          <td><a href="<?php echo url_for('admin/show_user.php?id=' .h(u($user->id_usr))); ?>">View User</a></td>
          <td><a href="<?php echo url_for('admin/update_user.php?id=' .h(u($user->id_usr))); ?>">Edit User</a></td>
          <td><a href="<?php echo url_for('admin/delete_user.php?id=' .h(u($user->id_usr))); ?>">Delete User</a></td>
        </tr>
      <?php } ?>
    </table>