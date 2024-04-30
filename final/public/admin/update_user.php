<?php
require_once('../../private/initialize.php');
require_login();
require_level(1);

$id = $_GET['id'] ?? '1';


$user = users::find_by_id($id);
if ($user == false) {
  redirect_to(url_for('admin/admin_index.php'));
}

if (is_post_request()) {

  $args = $_POST['user'];
  $user->merge_attributes($args);
  $result = $user->save();

  if ($result === true) {
    $_SESSION['message'] = 'The user was updated successfully.';
    redirect_to(url_for('admin/show_user.php?id=' . $id));
  } else {
  }
} else {
}

$page_title = 'Edit' . h($session->username_usr);
include(SHARED_PATH . '/public_header.php'); ?>


<main>
  <a class="back-link" href="<?php echo url_for('admin/all_users.php'); ?>">&laquo; Back to Admin hub</a>
  <div class="user edit">
    <h1>Edit <?php echo h($session->username_usr); ?></h1>
    <?php echo display_errors($user->errors); ?>
    <form action="<?php echo url_for('admin/update_user.php?id=' . h(u($id))); ?>" method="post">
      <?php include(SHARED_PATH . '/user_form_fields.php'); ?>
      <dl>
        <dt>User Level</dt>
        <dd>
          <label>
            <input type="checkbox" name="user[user_level_usr]" value="0" <?php echo ($user->user_level_usr == 1) ? "checked" : ""; ?>>
            Admin
          </label>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Edit <?php echo h($session->username_usr); ?>" />
      </div>
    </form>
    <a href="<?php echo url_for('members/deleteuser.php?id=' . $id) ?>">Delete Your account</a>
</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>