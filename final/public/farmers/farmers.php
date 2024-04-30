<?php require_once('../../private/initialize.php');
$page_title = 'Our Farmers';
include(SHARED_PATH . '/public_header.php');

$vendors = vendors::find_all();
$page_title = 'Vendors';


?>

<main>
<h1>All vendors</h1>
<p>Here you can find Every Farmer that Sells at our location.</p> 

<table>
  <tr>
    <th>Farmer name</th>
    <th>Description</th>
    <th>Other Information</th>
    <th>&nbsp;</th>
  </tr>

  <?php foreach ($vendors as $vendor) { ?>
    <tr>
      <td><?php echo h($vendor->vendor_name) ?></td>
      <td><?php echo h($vendor->vendor_description) ?></td>
      <td><?php echo h($vendor->other_vendor_info) ?></td>
      <td><a href="<?php echo url_for('vendors/showvendor.php?id=' . h(u($vendor->vendor_id))) ?>">view vendor</a></td>
    </tr>
    <?php } ?>
</table>
</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>