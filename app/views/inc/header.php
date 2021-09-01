<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>All Konow Store</title>
<meta name="description" content="description">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo URLROOT; ?>/images/favicon.png" />
<!-- Plugins CSS -->
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/plugins.css">
<!-- Main Style CSS -->
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/responsive.css">
</head>
<body class="index-demo1">
<div id="pre-loader"> <img src="<?php echo URLROOT; ?>/images/loader.gif" alt="Loading..." /> </div>
<div class="page-wrapper">
<!--Promotion Bar-->
<div class="notification-bar mobilehide"> <a href="<?php echo $data['offer_link']->link_url; ?>" class="notification-bar__message"><?php echo $data['offer_link']->content; ?></a> <span class="close-announcement"><i class="anm anm-times-l" aria-hidden="true"></i></span> </div>
<!--End Promotion Bar--> 
  <?php require APPROOT . '/views/inc/navbar.php'; ?>
  <!-- <div class="container"> -->
  
