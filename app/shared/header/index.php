<?php isset($page_title) ? $page_title : 'R2B';

if (!empty($loggedInUser)) :
  $user = $loggedInUser;
  $company = Business::find_by_user_id($user->id);
  $role = User::ROLE[$loggedInUser->role_id];
endif;
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $page_title; ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo url_for('assets/img/favicon.png') ?>">
  <!-- CSS here -->
  <link rel="stylesheet" href="<?php echo url_for('assets/css/preloader.css') ?>">
  <link rel="stylesheet" href="<?php echo url_for('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?php echo url_for('assets/css/meanmenu.css') ?>">
  <link rel="stylesheet" href="<?php echo url_for('assets/css/animate.min.css') ?>">
  <link rel="stylesheet" href="<?php echo url_for('assets/css/owl.carousel.min.css') ?>">
  <link rel="stylesheet" href="<?php echo url_for('assets/css/backToTop.css') ?>">
  <link rel="stylesheet" href="<?php echo url_for('assets/css/jquery.fancybox.min.css') ?>">
  <link rel="stylesheet" href="<?php echo url_for('assets/css/fontAwesome5Pro.css') ?>">
  <link rel="stylesheet" href="<?php echo url_for('assets/css/elegantFont.css') ?>">
  <link rel="stylesheet" href="<?php echo url_for('assets/css/default.css') ?>">
  <link rel="stylesheet" href="<?php echo url_for('assets/css/style.css') ?>">
</head>

<body>
  <?php
  include(SHARED_PATH . '/components/loader.php');
  include(SHARED_PATH . '/components/header.php');
  include(SHARED_PATH . '/components/sidebar.php');
  ?>