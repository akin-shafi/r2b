<?php
require_once('./app/initialize.php');

// require_login();

$page = 'Home';
$page_title = 'R2B | Home';

include(SHARED_PATH . '/header/index.php');
?>

<main>

   <?php include('./components/hero.php') ?>
   <?php include('./components/services-area.php') ?>
   <?php include('./components/about-area.php') ?>
   <?php include('./components/features-area.php') ?>
   <?php include('./components/cta-area.php') ?>

   <?php include('./components/team-area.php'); //**This is displayed none */ 
   ?>

   <?php include('./components/faq-area.php') ?>
   <?php include('./components/promotion-area.php') ?>

</main>


<?php include(SHARED_PATH . '/footer/index.php'); ?>
</body>

</html>