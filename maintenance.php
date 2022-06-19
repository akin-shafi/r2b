<?php
require_once('app/initialize.php');

$page = 'Notification';
$page_title = 'R2B | Maintenance';

include(SHARED_PATH . '/auth_header.php');
?>

<div class="container-xxl container-p-y">
  <div class="misc-wrapper">
    <h2 class="mb-2 mx-2">Under Maintenance!</h2>
    <p class="mb-4 mx-2">Sorry for the inconvenience but we're performing some maintenance at the moment</p>
    <a href="<?php echo url_for('dashboard/') ?>" class="btn btn-primary">Back to home</a>
    <div class="mt-4">
      <img src="<?php echo url_for('assets/img/illustrations/girl-doing-yoga-light.png') ?>" alt="girl-doing-yoga-light" width="500" class="img-fluid" data-app-dark-img="illustrations/girl-doing-yoga-dark.png" data-app-light-img="illustrations/girl-doing-yoga-light.png" />
    </div>
  </div>
</div>
<?php include(SHARED_PATH . '/auth_footer.php'); ?>