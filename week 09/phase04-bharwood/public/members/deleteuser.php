<?php
require_once('../../private/initialize.php');
require_login();

if (!isset($_GET['id'])) {
  redirect_to(url_for('members/index.php'));
}

$id = $_GET['id'];
require_id_match($id);
$user = users::find_by_id($id);
if ($user == false) {
  redirect_to(url_for('members/index.php'));
}

if (is_post_request()) {

  $result = $user->delete();
  $session->logout();
  $_SESSION['message'] = 'The user was deleted successfully.';
  redirect_to(url_for('members/index.php'));
} else {
}

$page_title = 'Delete user: ' . h($session->username_usr);
include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('members/index.php'); ?>">&laquo; Back to Home</a>

  <div class="user delete">
    <h1>Delete user <?php echo h($session->username_usr) ?></h1>
    <p>Are you sure you want to delete user <?php echo h($session->username_usr) .' '. h($user->full_name()); ?>?</p>

    <form action="<?php echo url_for('/members/deleteuser.php?id=' . h(u($id))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete user" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>