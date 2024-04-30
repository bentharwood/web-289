<?php require_once('../../private/initialize.php');
include(SHARED_PATH . '/public_header.php');
$produce = produce::find_all();
$id = $_GET['id'];
$vendor = vendors::find_by_id($id);
$page_title = $vendor->vendor_name . "'s Produce";

?>
<main>
  <h1><?php echo $vendor->vendor_name ?> Produce</h1>

  <table>
    <tr>
      <th>item name</th>
      <th>item description</th>
      <th>item price</th>
      <th>other item info</th>
    </tr>

    <?php foreach ($produce as $veg) {
      if ($veg->vendor_id == $id) {  ?>
        <tr>
          <td><?php echo h($veg->item_name); ?></td>
          <td><?php echo h($veg->item_description); ?></td>
          <td>$<?php echo h($veg->item_price); ?></td>
          <td><?php echo h($veg->other_item_info); ?></td>
        </tr>
    <?php }
    } ?>
  </table>

</main>
<?php include(SHARED_PATH . '/public_footer.php'); ?>