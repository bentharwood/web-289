<?php
require_once('../../private/initialize.php');
require_login();
require_level(1);
$id = $_GET['id'];

$vendor = vendors::find_by_id($id);
$produce = produce::find_all();
require_vendor_id_match($id, $vendor->vendor_id);
if ($vendor == false) {
  redirect_to(url_for('members/index.php'));
}

include(SHARED_PATH . '/public_header.php');?>

<main>
  <h1><?php echo $vendor->vendor_name ?>'s inventory</h1>
  <table>
    <tr>
    <th>item name</th>
    <th>item description</th>
    <th>item price</th>
    <th>other item info</th>
    <th>&nbsp;</th>
    </tr>

    <?php foreach($produce as $veg) { 
      if($veg->vendor_id == $id) {?>
    <tr>
      <td><?php echo h($veg->item_name); ?></td>
      <td><?php echo h($veg->item_description); ?></td>
      <td><?php echo h($veg->other_item_info); ?></td>
      <td>$<?php echo h($veg->item_price); ?></td>
      <td><a href="<?php echo url_for('vendors/delete_product.php?id=' . h(u($veg->item_id))) ?>">Delete</a></td>
    </tr>
    <?php }} ?>
  </table>

  <h2><a href="<?php echo url_for('vendors/add_produce.php?id=' . h(u($id))) ?>">Add Produce</a></h2>
</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>