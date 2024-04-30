<?php
require_once('../../private/initialize.php');
require_login();
require_level(2);
if (!isset($_GET['id'])) {
  redirect_to(url_for('/admin/all_users.php'));
}
$id = $_GET['id'];
$vendor = vendors::find_by_id($id);
if (is_post_request()) {

  $result = $vendor->delete();
  $_SESSION['message'] = 'The farmer was deleted successfully.';
  redirect_to(url_for('/admin/all_users.php'));
} else {
}

$page_title = 'Delete user: ' . h($vendor->vendor_name);
include(SHARED_PATH . '/public_header.php'); ?>


<main>
  <a class="back-link" href="<?php echo url_for('admin/all_users.php'); ?>">&laquo; Back to Admin hub</a>
  <h1>Delete farmer <?php echo h($vendor->vendor_name); ?></h1>

  <p>are you sure you want to delete <?php echo h($vendor->vendor_name) . h($session->username_usr) ?>?</p>
  <form action="<?php echo url_for('/admin/deletevendor.php?id=' . h(u($id))); ?>" method="post">
    <input type="submit" name="commit" value="Delete Farmer" />
    </div>
  </form>
</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>