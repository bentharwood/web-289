<?php
require_once('../../private/initialize.php');
require_login();

$id = $_GET['id'];
require_id_match($id);
$user = users::find_by_id($id);
if ($user == false) {
  redirect_to(url_for('members/index.php'));
}

if (is_post_request()) {

  $args = $_POST['user'];
  $user->merge_attributes($args);
  $result = $user->save();

  if ($result === true) {
    $_SESSION['message'] = 'The user was updated successfully.';
    redirect_to(url_for('members/showuser.php?id=' . $id));
  } else {
  }
} else {
}

?>

<?php $page_title = 'Edit' . h($session->username_usr); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('members/index.php'); ?>">&laquo; Back to home</a>

  <div class="user edit">
    <h1>Edit <?php echo h($session->username_usr); ?></h1>

    <?php echo display_errors($user->errors); ?>

    <form action="<?php echo url_for('members/edituser.php?id=' . h(u($id))); ?>" method="post">

      <?php include(SHARED_PATH . '/user_form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Edit <?php echo h($session->username_usr); ?>" />
      </div>
    </form>

    <a href="<?php echo url_for('members/deleteuser.php?id=' . $id) ?>">Delete Your account</a>

  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>

