<?php

require_once('../../private/initialize.php');
require_login();
require_level(1);
$id = $_GET['id'];
$vendor = vendors::find_by_id($id);
require_vendor_id_match($id, $vendor->vendor_id);
if (is_post_request()) {

  $args = $_POST['product'];
  $args['vendor_id'] = $id;
  $product = new produce($args);
  $result = $product->create();

  if ($result === true) {
    $_SESSION['message'] = 'The product was added successfully.';
  } else {
  }
} else {
  $product = new produce;
}

$page_title = 'Add Produce';
include(SHARED_PATH . '/public_header.php'); ?>
<main>
  <a class="back-link" href="<?php echo url_for('vendors/manage_inventory.php'); ?>">&laquo; Back to Admin hub</a>
  <h1>Add Produce to <?php echo $vendor->vendor_name ?>'s inventory' </h1>
  <form action="<?php echo url_for('vendors/add_produce.php?id=' . $vendor->vendor_id) ?>" method="post">

    <label for="item_name">Item Name:</label><br>
    <input type="text" id="item_name" name="product[item_name]"><br><br>

    <label for="item_description">Item Description:</label><br>
    <textarea id="item_description" name="product[item_description]"></textarea><br><br>

    <label for="item_price">Item Price:</label><br>
    <input type="number" id="item_price" name="product[item_price]"><br><br>

    <label for="other_item_info">Other Item Info:</label><br>
    <textarea id="other_item_info" name="product[other_item_info]"></textarea><br><br>

    <input type="submit" value="Create Inventory Item">

  </form>