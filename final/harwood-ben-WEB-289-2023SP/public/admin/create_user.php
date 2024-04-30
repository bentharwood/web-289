<?php

require_once('../../private/initialize.php');
require_login();
require_level(2);


if (is_post_request()) {

  $args = $_POST['user'];
  $user = new users($args);
  $user->user_level_usr = 0;
  $result = $user->save();

  if ($result === true) {
    $new_id = $user->id_usr;
    $_SESSION['message'] = 'The user was created successfully.';
    redirect_to(url_for('admin/show_user.php?id=' . $new_id));
  } else {
  }
} else {
  $user = new users;
}

$page_title = 'Create user';
include(SHARED_PATH . '/public_header.php'); ?>
<main>

  <a class="back-link" href="<?php echo url_for('admin/all_users.php'); ?>">&laquo; Back to Admin hub</a>
  <h1>Create user</h1>

  <?php echo display_errors($user->errors); ?>

  <form action="<?php echo url_for('admin/create_user.php'); ?>" method="post">

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
    <input type="submit" value="Create user" />
  </form>
  <p>Password must contain</p>
  <ul>
    <li>At least 6 characters</li>
    <li>At least 1 uppercase letter</li>
    <li>At least 1 lowercase letter</li>
    <li>At least 1 digit</li>
  </ul>
</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>