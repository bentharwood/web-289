<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {
  if ($session->is_logged_in()) {
    // If the user is already logged in, log them out first
    $session->logout();
  }

  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';
  // Validations
  if (is_blank($username)) {
    $errors[] = "Username cannot be blank.";
  }
  if (is_blank($password)) {
    $errors[] = "Password cannot be blank.";
  }

  // if there were no errors, try to login
  if (empty($errors)) {
    $user = users::find_by_username($username);
    // test if user found and password is correct
    if ($user != false && $user->verify_password($password)) {
      // Mark user as logged in
      $session->login($user);
      redirect_to(url_for('members/index.php'));
    } else {
      // username not found or password does not match
      $errors[] = "Log in was unsuccessful.";
    }
  }
}
?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<main>
  <h1>Log in</h1>
  <h2><a href="<?php echo url_for('members/newuser.php'); ?>">Don't have an account? Want To Become A Vendor? Sign up Here!</a></h2>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo h($username); ?>" require minlength="2" maxlength="255"><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" value="" minlength="6" maxlength="190"><br>
    <input type="submit" name="submit" value="Login">
  </form>
</main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>