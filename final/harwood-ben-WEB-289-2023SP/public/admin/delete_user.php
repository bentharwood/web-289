<?php
require_once('../../private/initialize.php');
require_login();
require_level(2);
if (!isset($_GET['id'])) {
  redirect_to(url_for('/admin/all_users.php'));
}
$id = $_GET['id'];
$user = users::find_by_id($id);
if (is_post_request()) {

  $result = $user->delete();
  $_SESSION['message'] = 'The user was deleted successfully.';
  redirect_to(url_for('/admin/all_users.php'));
} else {
}

$page_title = 'Delete user: ' . h($session->username_usr);
include(SHARED_PATH . '/public_header.php'); ?>

<main>
  <a class="back-link" href="<?php echo url_for('admin/all_users.php'); ?>">&laquo; Back to Admin hub</a>
  <h1>Delete user <?php echo h($session->username_usr) ?></h1>
  <p>Are you sure you want to delete user <?php echo h($session->username_usr) . ' ' . h($user->full_name()); ?>?</p>
  <form action="<?php echo url_for('/admin/delete_user.php?id=' . h(u($id))); ?>" method="post">
    <input type="submit" name="commit" value="Delete user" />
    </div>
  </form>
</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>