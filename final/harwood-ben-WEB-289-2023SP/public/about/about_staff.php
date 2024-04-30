<?php require_once('../../private/initialize.php');
$page_title = 'About Our Staff';
include(SHARED_PATH . '/public_header.php');
?>
<main id="about-staff">
  <h1>Meet Our Dedicated Team</h1>

  <div class="staff-member">
    <img src="<?php echo url_for('imgs/about/sarah_johnson.jpg') ?>" alt="Sarah Johnson, by Christopher Campbell at unsplash.com." height="640" width="960">
    <div>
      <h2>Sarah Johnson</h2>
      <h3>Market Manager</h3>
    </div>
    <p>Sarah's passion for sustainable agriculture and community development led her to the role of Market Manager at Asheville Farmers Market. With her extensive experience and deep-rooted connections within the local farming community, Sarah is dedicated to fostering relationships between growers, artisans, and patrons to create a thriving market environment.</p>
  </div>

  <div class="staff-member">
    <img src="<?php echo url_for('imgs/about/michael_nguyen.jpg') ?>" alt="Michael Nguyen, by Matheus Ferrero at unsplash.com." height="640" width="960">
    <div>
      <h2>Michael Nguyen</h2>
      <h3>Operations Coordinator</h3>
    </div>
    <p>As our Operations Coordinator, Michael is the logistical mastermind behind the scenes, ensuring that every aspect of Asheville Farmers Market runs smoothly. From vendor coordination to event planning and customer service, Michael's attention to detail and can-do attitude are instrumental in creating a seamless and enjoyable market experience for all.</p>
  </div>

  <div class="staff-member">
    <img src="<?php echo url_for('imgs/about/emily_parker.jpg') ?>" alt="Emily Parker, by Jurica Koletić at unsplash.com." height="640" width="427">
    <div>
      <h2>Emily Parker</h2>
      <h3>Marketing and Communications Specialist</h3>
    </div>
    <p>Emily brings her creative flair and passion for storytelling to her role as Marketing and Communications Specialist at Asheville Farmers Market. With a keen eye for design and a knack for engaging content, Emily works tirelessly to spread the word about the market's offerings and events, connecting with patrons both online and in-person.</p>
  </div>

  <div class="staff-member">
    <img src="<?php echo url_for('imgs/about/david_rodriguez.jpg') ?>" alt="David Rodriguez, by Shashank Verma at unsplash.com." height="640" width="800">
    <div>
      <h2>David Rodriguez</h2>
      <h3>Customer Experience Coordinator</h3>
    </div>
    <p>As the Customer Experience Coordinator, David is the friendly face you'll see greeting you at Asheville Farmers Market. With his warm demeanor and dedication to customer satisfaction, David ensures that every visitor feels welcome and valued, providing assistance, answering questions, and fostering a sense of community at the market.</p>
  </div>
</main>
<?php
include(SHARED_PATH . '/public_footer.php');
?>