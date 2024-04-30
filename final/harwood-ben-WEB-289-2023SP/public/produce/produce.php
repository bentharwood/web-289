<?php require_once('../../private/initialize.php');
$page_title = 'All Produce';
include(SHARED_PATH . '/public_header.php');
$produce = produce::find_all();

?>
<main>
  <h1>Produce</h1>

  <table>
    <tr>
    <th>item name</th>
    <th>item description</th>
    <th>item price</th>
    <th>other item info</th>
    <th>&nbsp;</th>
    </tr>

    <?php foreach($produce as $veg) { ?>
      <tr>
      <td><?php echo h($veg->item_name); ?></td>
      <td><?php echo h($veg->item_description); ?></td>
      <td>$<?php echo h($veg->item_price); ?></td>
      <td><?php echo h($veg->other_item_info); ?></td>
      <td><a href="<?php echo url_for('vendors/vendor_produce.php?id=' . $veg->vendor_id) ?>">View Vendor</a></td>
      </tr>
    <?php } ?>
  </table>

</main>
<?php include(SHARED_PATH . '/public_footer.php'); ?>