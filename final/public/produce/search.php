<?php
require_once('../../private/initialize.php');
include(SHARED_PATH . '/public_header.php'); 

$search_query = isset($_GET['search']) ? $_GET['search'] : '';

$results = [];
if ($search_query) {
    $results = produce::find_by_item_name($search_query);
}
?>

<main>
  <form action="<?php echo url_for('produce/search.php') . '?search=' . urlencode($search_query); ?>" method="get">

    <label for="search">Search:</label>
    <input type="text" id="search" name="search" placeholder="Enter your search term" value="<?php echo htmlspecialchars($search_query); ?>">
    <button type="submit">Search</button>
  </form>

  <?php if (!empty($results)) { ?>
    <table>
      <tr>
        <th>item name</th>
        <th>item description</th>
        <th>item price</th>
        <th>other item info</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach ($results as $veg) {?>
        <tr>
          <td><?php echo h($veg->item_name); ?></td>
          <td><?php echo h($veg->item_description); ?></td>
          <td><?php echo h($veg->other_item_info); ?></td>
          <td>$<?php echo h($veg->item_price); ?></td>
          <td><a href="<?php echo url_for('vendors/vendor_produce.php?id=' . $veg->vendor_id) ?>">View Vendor</a></td>
        </tr>
      <?php } ?>
    </table>
  <?php } else if ($search_query) { ?>
    <p>No results found for "<?php echo htmlspecialchars($search_query); ?>"</p>
  <?php } ?>
</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
