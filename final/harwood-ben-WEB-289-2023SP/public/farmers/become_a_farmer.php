<?php require_once('../../private/initialize.php');
$page_title = 'Vendor Signup';
include(SHARED_PATH . '/public_header.php');
require_login();

if(is_post_request()) {
  $args = $_POST['vendor'];
  $vendor = new vendors($args);
  $result = $vendor->save();

  if($result === true) {
    $vendor = vendors::find_by_vendor_name($vendor->vendor_name);
    $vendor_id = $vendor->vendor_id;
    $_SESSION['message'] = 'you have successfully become a vendor.';
    $user = users::find_by_id($session->get_user_id());
    $user->user_level_usr = 1;
    $user->vendor_id = $vendor_id;
    $user->save();
    redirect_to(url_for('/vendors/showvendor.php?id=' . $vendor_id));
  }else {
  }
} else {
  $vendor = new vendors;

}
?>

<main>
  <a class="back-link" href="<?php echo url_for('members/index.php'); ?>">&laquo; Back to Home</a>

  <h1>Vendor Sign Up</h1>

  <?php echo display_errors($vendor->errors); ?>

  <form action="<?php echo url_for('farmers/become_a_farmer.php') ?>" method="post">

  <label for="vendor_name">Vendor Name:</label>
    <input type="text" id="vendor_name" name="vendor[vendor_name]" required value="<?php echo h($vendor->vendor_name); ?>">
    
    <label for="vendor_description">Vendor Description:</label>
    <textarea id="vendor_description" name="vendor[vendor_description]" rows="4" cols="50" value="<?php echo h($vendor->vendor_description); ?>"></textarea>

    <label for="other_vendor_info">Other Vendor Information</label>
    <textarea name="vendor[other_vendor_info]" id="other_vendor_info" rows="4" cols="50" value="<?php echo h($vendor->other_vendor_info); ?>"></textarea>

    <input type="submit" value="Become A Vendor" >

  </form>

</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>