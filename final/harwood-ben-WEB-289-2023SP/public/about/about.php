<?php require_once('../../private/initialize.php');
$page_title = 'About us';
include(SHARED_PATH . '/public_header.php');
?>

<main>
  <section id="about">
    <h1>About Asheville Farmers Market</h1>
    <div>
      <div>
        <p>Welcome to Asheville Farmers Market, where the essence of community thrives amidst the bounty of local agriculture and artisanal crafts. Nestled in the heart of Asheville, North Carolina, our market serves as a vibrant hub where farmers, artisans, and patrons come together to celebrate the richness of our region.</p>
        <p>Founded with a commitment to supporting local producers and fostering sustainable practices, Asheville Farmers Market has grown into a beloved institution cherished by locals and visitors alike. Since our inception, we've remained dedicated to promoting the values of freshness, quality, and connection to the land.</p>
      </div>
      <img src="<?php echo url_for('imgs/about/thom-milkovic.jpg') ?>" alt="fresh peaches and plums, by thom milkovic on unsplash.com." height="640" width="360">
    </div>

    <div>
      <div>
        <p>At our market, you'll discover a diverse array of offerings, from farm-fresh produce and handcrafted goods to delectable treats and unique finds. Each vendor brings a story to share, a passion to inspire, and a commitment to excellence that defines the spirit of our community.</p>
        <p>But Asheville Farmers Market is more than just a place to shop – it's a destination where friendships are forged, traditions are honored, and memories are made. Whether you're seeking the perfect heirloom tomato, a one-of-a-kind handmade treasure, or simply a warm smile and friendly conversation, you'll find it here.</p>
      </div>
      <img src="<?php echo url_for('imgs/about/rob-wicks.jpg') ?>" alt="fresh heirloom tomatoes, by rob wicks on unsplash.com" height="640" width="360">
    </div>
    <p class="aright" >Asheville Farmers Market invites you to experience the magic of local living, to savor the flavors of the season, and to join us in celebrating the vibrant tapestry of our community. We look forward to welcoming you to our market and sharing in the joys of good food, good company, and good times.</p>
  </section>
</main>

<?php
include(SHARED_PATH . '/public_footer.php');
?>