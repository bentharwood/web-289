<?php
require_once('../../private/initialize.php');

$page_title = 'Home';
include(SHARED_PATH . '/public_header.php');

?>
<main>
  <section>
    <div id="carasel">
      <button id="carasel_back"><span class="material-symbols-outlined">arrow_back_ios</span></button>
      <img id="carasel1" src="<?php echo url_for('imgs/carasel/kenny-eliason.jpg') ?>" height="4896" width="3264" alt="A bunch of vegetables on a table, by kenny eliason on unsplash">

      <img id="carasel2" src="<?php echo url_for('imgs/carasel/mk-s.jpg') ?>" height="4896" width="3264" alt="A bunch of vegetables in boxes, by mk-s on unsplash">

      <img id="carasel3" src="<?php echo url_for('imgs/carasel/shelley-paul.jpg') ?>" height="7167" width="4941" alt="A bunch of vegetables in a box, by shelly pauls on unsplash">
      <button id="carasel_forward"><span class="material-symbols-outlined">arrow_forward_ios</span></button>
    </div>
  </section>

  <section>
    <h2>Welcome to the Asheville Farmers Market!</h2>

    <p>Where the vibrant spirit of our community meets the bounty of the season! Nestled in the heart of Asheville, North Carolina, our market is a celebration of local agriculture, artisanal crafts, and the unique flavors that make our region thrive.</p>
    <p>At the Asheville Farmers Market, you'll discover a cornucopia of fresh produce harvested straight from nearby farms, bursting with the colors and tastes of the Appalachian foothills. From crisp apples and juicy tomatoes to fragrant herbs and heirloom varieties, our vendors bring the very best of the season's offerings directly to you.</p>
    <p>But our market is more than just a place to shop — it's a gathering space where neighbors come together to connect, share stories, and support the farmers and artisans who sustain our community. Whether you're a seasoned locavore or new to the farm-to-table movement, you'll find a warm welcome and a wealth of knowledge from our friendly vendors and passionate community members.</p>
    <p>In addition to farm-fresh produce, the Asheville Farmers Market showcases a diverse array of locally made goods, including handcrafted pottery, artisanal cheeses, small-batch jams and preserves, and so much more. Each item tells a story of craftsmanship, tradition, and the rich cultural heritage of Western North Carolina.</p>
    <p>Join us at the Asheville Farmers Market and experience the magic of our vibrant community. Shop, taste, and connect with the people and flavors that make Asheville a truly special place to call home. We can't wait to see you at the market!</p>
  </section>

  <section class="featured">
    <div>
      <h2>Featured Farmers</h2>
      <p>Meet our esteemed farmers Abubakar Balogun, Amol Sonar, and Tim Doerfler, whose dedication to sustainable agriculture and passion for quality produce have earned them a spotlight on the front page of Asheville Farmers Market. With their diverse backgrounds and commitment to excellence, they represent the vibrant tapestry of our local farming community.</p>
    </div>

    <div>
      <img src="<?php echo url_for('imgs/users/abubakar-balogun.jpg') ?>" alt="abubakar balogun standing in front of his crops, taken by Abubakar Balogun on unsplash." height="3969" width="2448">
      <p>Abubakar Balogun, a visionary steward of the land, blends time-honored farming practices with modern sustainability methods, resulting in bountiful harvests that reflect his deep connection to the earth. </p>
    </div>

    <div>
      <img src="<?php echo url_for('imgs/users/amol-sonar.jpg') ?>" alt="amol sonar standing in front of his crops, taken by amol sonar on unsplash." height="6720" width="4480">
      <p>Amol Sonar, renowned for his experimental approach to organic farming, pioneers sustainable techniques that yield robust crops while safeguarding the ecological balance of our land. </p>
    </div>

    <div>
      <img src="<?php echo url_for('imgs/users/tim-doerfler.jpg') ?>" alt="tim doerfler standing in front of his crops, taken by tim doerfler on unsplash." height="5552" width="3701">
      <p>Tim Doerfler, with his meticulous attention to detail and decades of experience, is a beacon of expertise in heirloom produce, preserving the heritage of our agricultural heritage one season at a time.</p>
    </div>
    <h2><a href="<?php echo url_for('members/newuser.php') ?> ">Calling all vendors! Join our community and showcase your goods at Asheville Farmers Market. Sign up now to share your products with our vibrant audience</a></h2>
  </section>
</main>

<?php
include(SHARED_PATH . '/public_footer.php');

?>