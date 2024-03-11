<!DOCTYPE html>
<html lang='en'>

<head>
  <title>
  <?php echo h($page_title ?? 'Asheville Farmers Market'); ?>
  </title>
  <meta charset='utf-8'>
  <link rel="stylesheet" href="<?php echo url_for('stylesheets/public.css') ?>">
</head>

<body>
  <header>
    <div id="top_level">
      <?php if (!$session->is_logged_in()) : ?>
        <div class="dropdown">
          <button>User</button>
          <div class="dropdown-content">
            <a href="<?php echo url_for('members/login.php'); ?>">login</a>
          </div>
        </div>
      <?php else : ?>
        <div class="dropdown">
          <button>Hello, <?php echo h($session->username_usr); ?></button>
          <div class="dropdown-content">
            <a href="<?php echo url_for('members/logout.php'); ?>">logout <?php echo h($session->username_usr); ?></a>
            <a href="<?php echo url_for('members/login.php') ?>">Switch Account</a>
            <a href="<?php echo url_for('members/showuser.php?id=' . h($session->get_user_id())); ?>">View Profile</a>
            <a href="<?php echo url_for('members/edituser.php?id=' . h($session->get_user_id())); ?>">Edit Profile</a>
          </div>
        </div>
        <?php endif; ?>
       <h1>Asheville Farmers Market</h1>
      <form action="js/main.js">
        <input type="checkbox" id="hidden">
        <input type="text" id="search">
        <label for="hidden">
          <img src="<?php echo url_for('images/icons/icons8-search.svg') ?>" alt="A search button magnifying glass.">
        </label>
      </form>
    </div>
    <nav>
    <div class="dropdown">
        <button>Home</button>
        <div class="dropdown-content">
          <a href="<?php echo url_for('members/index.php') ?>">Home</a>

        </div>
      </div>

      <div class="dropdown">
        <button>About</button>
        <div class="dropdown-content">
          <a href="<?php echo url_for('about/about.php') ?>">About</a>
          <a href="<?php echo url_for('about/about_staff.php') ?>">About The Staff</a>
          <a href="<?php echo url_for('about/volunteer.php') ?>">Volunteer</a>
          <a href="<?php echo url_for('about/contact.php') ?>">Contact</a>
        </div>
      </div>

      <div class="dropdown">
        <button>Farmers</button>
        <div class="dropdown-content">
          <a href="<?php echo url_for('farmers/farms.php') ?>">Farms</a>
          <a href="<?php echo url_for('farmers/farmers.php') ?>">Farmers</a>
        </div>
      </div>

      <div class="dropdown">
        <button>Produce</button>
        <div class="dropdown-content">
          <a href="<?php echo url_for('produce/produce.php') ?>">Produce</a>
          <a href="<?php echo url_for('produce/local_food.php') ?>">Local Food</a>
          <a href="<?php echo url_for('produce/latest_produce.php') ?>">Latest Produce</a>
          <a href="<?php echo url_for('produce/on_sale.php') ?>">On Sale</a>
        </div>
      </div>

      <?php if($session->user_level() == 1): ?>
      <div class="dropdown">
        <button>Admin</button>
        <div class="dropdown-content">
          <a href="<?php echo url_for('admin/admin_index.php') ?>">Admin Home</a>
        </div>
      </div>
      <?php endif;?>
    </nav>
  </header>