<?php

require_once('../../private/initialize.php');


if (is_post_request()) {

  $args = $_POST['user'];
  $user = new users($args);
  $user->user_level_usr = 0;
  $result = $user->save();

  if ($result === true) {
    $new_id = $user->id_usr;
    $_SESSION['message'] = 'The user was created successfully.';
    redirect_to(url_for('/members/showuser.php?id=' . $new_id));
  } else {
  }
} else {
  $user = new users;
}

?>

<?php $page_title = 'Create user'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('members/index.php'); ?>">&laquo; Back to Home</a>

  <div class="user new">
    <h1>Create user</h1>

    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo url_for('members/newuser.php'); ?>" method="post">

      <?php include(SHARED_PATH . '/user_form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create user" />
      </div>
    </form>
    <p>Password must contain</p>
    <ul>
      <li>At least 12 characters</li>
      <li>At least 1 uppercase letter</li>
      <li>At least 1 lowercase letter</li>
      <li>At least 1 digit</li>
      <li>And at least 1 of !@#$%^&*</li>
      <li>But cannot contain ()[]{}&lt;&gt;~`;:',."/?\|-_+=*&amp;%$#@</li>
    </ul>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>