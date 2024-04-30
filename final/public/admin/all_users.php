<?php require_once('../../private/initialize.php');
require_login();
require_level(2);

$users = users::find_all();
$vendors = vendors::find_all();

$page_title = 'manage';
include(SHARED_PATH . '/public_header.php');
?>
<main>
  <h1>users</h1>
  <a href="<?php echo url_for('admin/create_user.php') ?>">Create a new user</a>

  <table>
    <tr>
      <th>ID</th>
      <th>First name</th>
      <th>Last name</th>
      <th>Email</th>
      <th>Username</th>
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
        <td><?php echo h($user->user_level_usr == 2) ? "admin" : "user";  ?></td>
        <td><a href="<?php echo url_for('admin/show_user.php?id=' . h(u($user->id_usr))); ?>">View User</a></td>
        <td><a href="<?php echo url_for('admin/update_user.php?id=' . h(u($user->id_usr))); ?>">Edit User</a></td>
        <td><a href="<?php echo url_for('admin/delete_user.php?id=' . h(u($user->id_usr))); ?>">Delete User</a></td>
      </tr>
    <?php } ?>
  </table>

  <h1>all farmers </h1>
  <table>
  <tr>
    <th>Farmer id</th>
    <th>Farmer name</th>
    <th>Description</th>
    <th>Other Information</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
  </tr>

  <?php foreach ($vendors as $vendor) { ?>
    <tr>
      <td><?php echo h($vendor->vendor_id) ?></td>
      <td><?php echo h($vendor->vendor_name) ?></td>
      <td><?php echo h($vendor->vendor_description) ?></td>
      <td><?php echo h($vendor->other_vendor_info) ?></td>
      <td><a href="<?php echo url_for('admin/showvendor.php?id=' . h(u($vendor->vendor_id))) ?>">view farmer</a></td>
      <td><a href="<?php echo url_for('admin/editvendor.php?id=' . h(u($vendor->vendor_id))) ?>">edit farmer</a></td>
      <td><a href="<?php echo url_for('admin/deletevendor.php?id=' . h(u($vendor->vendor_id))) ?>">delete farmer</a></td>
    </tr>
    <?php } ?>
</table>

  
</main>