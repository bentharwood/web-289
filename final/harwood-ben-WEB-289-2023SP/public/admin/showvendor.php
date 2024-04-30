<?php require_once('../../private/initialize.php');
require_login();
require_level(2);

$id = $_GET['id'] ?? '1';

$vendor = vendors::find_by_id($id);
$page_title = 'Show vendor: ' . h($vendor->vendor_name);
include(SHARED_PATH . '/public_header.php'); ?>

<main>
  <a class="back-link" href="<?php echo url_for('admin/all_users.php'); ?>">&laquo; Back to Admin hub</a>

  <h1>farmer: <?php echo h($vendor->vendor_name); ?></h1>

  <dl>
    <dt>Farmer id</dt>
    <dd><?php echo h($vendor->vendor_id); ?></dd>
  </dl>
  <dl>
    <dt>Farmer name</dt>
    <dd><?php echo h($vendor->vendor_name); ?></dd>
  </dl>
  <dl>
    <dt>Farmer Description</dt>
    <dd><?php echo h($vendor->vendor_description); ?></dd>
  </dl>
  <dl>
    <dt>Farmer Other Information</dt>
    <dd><?php echo h($vendor->other_vendor_info); ?></dd>
  </dl>

</main>

<?php include(SHARED_PATH . '/public_footer.php') ?>