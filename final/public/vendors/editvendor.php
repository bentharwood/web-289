<?php
require_once('../../private/initialize.php');
require_login();
require_level(1);
$id = $_GET['id'];

$vendor = vendors::find_by_id($id);
require_vendor_id_match($id, $vendor->vendor_id);
if ($vendor == false) {
  redirect_to(url_for('members/index.php'));
}

if (is_post_request()) {

  $args = $_POST['vendor'];
  $vendor->merge_attributes($args);
  $result = $vendor->update();
  if ($result === true) {
    $_SESSION['message'] = 'The farmer was updated successfully.';
    redirect_to(url_for('vendors/showvendor.php?id=' . $id));
  } else {
  }
} else {
}

$page_title = 'Edit ' . h($vendor->vendor_name);
include(SHARED_PATH . '/public_header.php'); ?>

<main>
  <a class="back-link" href="<?php echo url_for('members/index.php'); ?>">&laquo; Back to Admin hub</a>
  <h1>Edit <?php echo h($vendor->vendor_name); ?></h1>
  <?php echo display_errors($vendor->errors); ?>
  <form action="<?php echo url_for('vendors/editvendor.php?id=' . h(u($id))) ?>" method="post">

    <input type="text" id="vendor_name" name="vendor[vendor_name]" required value="<?php echo h($vendor->vendor_name); ?>">

    <label for="vendor_description">Vendor Description:</label>
    <textarea id="vendor_description" name="vendor[vendor_description]" rows="4" cols="50" value="<?php echo h($vendor->vendor_description); ?>"></textarea>

    <label for="other_vendor_info">Other Vendor Information</label>
    <textarea name="vendor[other_vendor_info]" id="other_vendor_info" rows="4" cols="50" value="<?php echo h($vendor->other_vendor_info); ?>"></textarea>

    <input type="submit" value="edit farmer">
  </form>
  <h2><a href="<?php echo url_for('vendors/manage_inventory.php?id=' . $id) ?>">manage inventory</a></h2>
</main>

<?php include(SHARED_PATH . '/public_footer.php') ?>