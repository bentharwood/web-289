<?php require_once('../../private/initialize.php');
$page_title = 'Our Farms';
include(SHARED_PATH . '/public_header.php');
?>

<main>
  <h1>Our Farms and Farm Practices</h1>
  <p>At Asheville Farmers Market, we take great pride in the quality and sustainability of the produce offered by our local farms. Our farmers are dedicated to ethical and environmentally friendly farming practices that prioritize the health of the land and the well-being of our community.</p>

  <h2>Supporting Local Agriculture</h2>
  <p>We believe in the importance of supporting local agriculture and fostering a strong connection between farmers and consumers. By shopping at Asheville Farmers Market, you are not only getting the freshest and most flavorful produce, but you are also supporting the livelihoods of our local farmers and the continued vitality of our region's agricultural heritage.</p>

  <h2>Sustainable Farming Practices</h2>
  <p>Our farmers are committed to sustainable farming practices that promote soil health, conserve water resources, and minimize environmental impact. Many of our farmers utilize organic or regenerative farming methods, avoiding synthetic pesticides and fertilizers and instead focusing on building healthy, resilient ecosystems.</p>

  <h2>Transparency and Accountability</h2>
  <p>Transparency and accountability are paramount to us at Asheville Farmers Market. We encourage our farmers to engage with customers, sharing information about their growing practices, certifications, and any additional efforts they make to prioritize sustainability and ethical treatment of animals.</p>

  <h2>Community Engagement</h2>
  <p>We believe that a vibrant community is built on the foundation of strong relationships and shared values. That's why we strive to foster connections between farmers and consumers, providing opportunities for education, conversation, and collaboration. Whether it's through farm tours, workshops, or community events, we aim to create a supportive and inclusive environment where everyone can learn and grow together.</p>

  <h2><a href="<?php echo url_for('members/newuser.php') ?>">Calling all farmers! Ready to showcase your harvest at the Asheville Farmers Market? Join us today and connect with a vibrant community eager for your fresh produce!!</a></h2>
</main>

<?php include(SHARED_PATH . '/public_footer.php') ?>