<?php require_once('../../private/initialize.php');
$errors = [];
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='utf-8'>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="<?php echo (isset($description))  ? $description : 'This project is my capstone for my web and software development degree' ?> Author: Ben Harwood">
  <title>
    <?php echo h($page_title ?? 'Asheville Farmers Market'); ?>
  </title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
  <link rel="stylesheet" href="<?php echo url_for('stylesheets/public.css') ?>">
  <link rel="icon" type="image/x-icon" href="<?php echo url_for('imgs/fresh-fields-logo.svg') ?>">
  <script src="<?php echo url_for('../private/js/main.js') ?>" defer></script>
</head>

<body>
  <header>
    <section>
      <div>
        <a href="<?php echo url_for('members/index.php'); ?>">
          <img src="<?php echo url_for('imgs/fresh-fields-logo.svg') ?>" alt="A bulls head logo." height="75" width="75">
        </a>
        <a href="<?php echo url_for('members/index.php'); ?>">
          <h1>Asheville Farmers Market</h1>
        </a>
      </div>

      <?php if (!$session->is_logged_in()) : ?>
        <div class="login">
          <a href="<?php echo url_for('members/login.php'); ?>"><span class="material-symbols-outlined">login</span>Login</a>
        </div>
      <?php else : ?>
        <div class="dropdown">
          <img id="profile_image" src="<?php echo (isset($session->profile_image)) ? $session->profile_image : url_for('imgs/users/blank-profile.png') ?>" alt="Your profile image, default profile image by Stephanie Edwards from Pixabay" height="50" width="50">
          <ul id="user_options">
            <li><a href="<?php echo url_for('members/logout.php'); ?>">logout <?php echo h($session->username_usr); ?></a></li>
            <li><a href="<?php echo url_for('members/login.php') ?>">Switch Account</a></li>
            <li><a href="<?php echo url_for('members/showuser.php?id=' . h($session->get_user_id())); ?>">View Profile</a></li>
            <li><a href="<?php echo url_for('members/edituser.php?id=' . h($session->get_user_id())); ?>">Edit Profile</a></li>
          </ul>
        </div>
      <?php endif; ?>
    </section>

    <nav>
      <div class="dropdown">
        <p>Home<span class="material-symbols-outlined">arrow_drop_down</span></p>
        <ul>
          <li><a href="<?php echo url_for('members/index.php') ?>">Home</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <p>About<span class="material-symbols-outlined">arrow_drop_down</span></p>
        <ul>
          <li><a href="<?php echo url_for('about/about.php') ?>">About</a></li>
          <li><a href="<?php echo url_for('about/about_staff.php') ?>">About The Staff</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <p>Farmers<span class="material-symbols-outlined">arrow_drop_down</span></p>
        <ul>
          <li><a href="<?php echo url_for('farmers/farms.php') ?>">Farms</a></li>
          <li><a href="<?php echo url_for('farmers/farmers.php') ?>">Farmers</a></li>
          <li><a href="<?php echo url_for('farmers/become_a_farmer.php') ?>">Become A Vendor</a></li>
        </ul>
      </div>

      <div class="dropdown">
        <p>Produce<span class="material-symbols-outlined">arrow_drop_down</span></p>
        <ul>
          <li><a href="<?php echo url_for('produce/produce.php') ?>">Produce</a></li>
          <li><a href="<?php echo url_for('produce/search.php') ?>">search Produce</a></li>
        </ul>
      </div>

      <?php if ($session->user_level() == 1) : $user = users::find_by_id($session->get_user_id())?>
        <div class="dropdown">
          <p>Vendor<span class="material-symbols-outlined">arrow_drop_down</span></p>
            <ul>
              <li><a href="<?php echo url_for('vendors/showvendor.php?id=' . $user->vendor_id); ?>">View profile</a></li>
              <li><a href="<?php echo url_for('vendors/editvendor.php?id=' . $user->vendor_id) ?>">Edit profile</a></li>
              <li><a href="<?php echo url_for('vendors/deletevendor.php?id=' . $user->vendor_id) ?>">delete profile</a></li>
            </ul>
        </div>
      <?php endif; ?>


      <?php if ($session->user_level() == 2) : ?>
        <div class="dropdown">
          <p>Admin<span class="material-symbols-outlined">arrow_drop_down</span></p>
            <ul>
              <li><a href="<?php echo url_for('admin/create_user.php') ?>">Create A User</a></li>
              <li><a href="<?php echo url_for('admin/all_users.php') ?>">Manage users</a></li>
            </ul>
        </div>
      <?php endif; ?>
    </nav>

    <div class="session_message">
      <?php echo $session->message(); ?>
    </div>

  </header>