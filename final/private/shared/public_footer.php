<footer>
      <div class="socials">
        <ul>
          <li><a href="https://www.facebook.com" target="_blank"><img src="<?php echo url_for('imgs/social/facebook_icon.svg') ?>" alt=""></a></li>
          <li><a href="https://www.instagram.com" target="_blank"><img src="<?php echo url_for('imgs/social/instagram_icon.svg') ?>" alt=""></a></li>
          <li><a href="https://www.youtube.com" target="_blank"><img src="<?php echo url_for('imgs/social/youtube_icon.svg') ?>" alt=""></a></li>
          <li><a href="https://www.twitter.com" target="_blank"><img src="<?php echo url_for('imgs/social/twitter_icon.svg') ?>" alt=""></a></li>
          <li><a href="https://www.linkedin.com" target="_blank"><img src="<?php echo url_for('imgs/social/linkedin_icon.svg') ?>" alt=""></a></li>
          <li><a href="https://www.tiktok.com" target="_blank"><img src="<?php echo url_for('imgs/social/tiktok_icon.svg') ?>" alt=""></a></li>
        </ul>
      </div>

      <h2>Asheville Farmers Market</h2>
      <p>copyright &copy; 2024 <span>Asheville Farmers Market, inc</span></p>

      <div class="footer-nav">
        <ul>
          <li><a href="<?php echo url_for('footer/legal.php') ?>">Legal</a></li>
          <li><a href="#">Security</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="#">Privacy</a></li>
          <li><a href="#">Jobs</a></li>
        </ul>
      </div>
    </footer>
  </body>

  <?php require_once('../../private/initialize.php');
    $session->clear_message()
  ?>

