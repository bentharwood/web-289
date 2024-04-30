<?php
require_once('../../private/initialize.php');
require_login();
require_level(1);
$id = $_GET['id'];
if (!isset($_GET['id'])) {
  redirect_to(url_for('/members/index.php'));
}
$product = produce::find_item_by_id($id);
if (is_post_request()) {

  $result = $product->delete();
  $_SESSION['message'] = 'The product was deleted successfully.';
  redirect_to(url_for('/members/index.php'));
} else {
}
var_dump($product);
$page_title = 'Delete product:' . h($product->item_name);
include(SHARED_PATH . '/public_header.php'); ?>

<main>
  <a class="back-link" href="<?php echo url_for('members/index.php.php'); ?>">&laquo; Back to Home</a>
  <h1>Are you Sure you want to delete <?php echo $product->item_name ?>?</h1>
  <form action="<?php echo url_for('vendors/delete_product.php?id=' . h(u($id))) ?>" method="post">
    <input type="submit" value="I'm Sure">
  </form>