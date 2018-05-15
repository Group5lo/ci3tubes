<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?><!doctype html>
<head>
<title>Gadget Compare And Shop</title>
<meta charset="utf-8">
<!-- CSS Files -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/bigshot/css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/bigshot/menu/css/simple_menu.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/bigshot/css/nivo-slider.css" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bigshot/boxes/css/style5.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css">
<!-- JS Files -->
<script src="<?php echo base_url() ?>assets/bigshot/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/jquery.eislideshow.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/custom.js"></script>
<script>
jQuery.noConflict()(function ($) {
    $('#ei-slider').eislideshow({
        animation: 'center',
        autoplay: true,
        slideshow_interval: 3000,
        titlesFactor: 0
    });
});
</script>
<script src="<?php echo base_url() ?>assets/bigshot/js/slides/slides.min.jquery.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/cycle-slider/cycle.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/nivo-slider/jquery.nivo.slider.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/tabify/jquery.tabify.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/prettyPhoto/jquery.prettyPhoto.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/twitter/jquery.tweet.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/scrolltop/scrolltopcontrol.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/portfolio/filterable.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/modernizr/modernizr-2.0.3.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/easing/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/kwicks/jquery.kwicks-1.5.1.pack.js"></script>
<script src="<?php echo base_url() ?>assets/bigshot/js/swfobject/swfobject.js"></script>
<!-- FancyBox -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/bigshot/js/fancybox/jquery.fancybox.css" media="all">
<script src="<?php echo base_url() ?>assets/bigshot/js/fancybox/jquery.fancybox-1.2.1.js"></script>
</head>
<body style="background: #FFF">
<div style="width:100%; background: #FFF">
  <div class="header">
    <!-- Logo/Title -->
    <div id="site_title"><a href="<?php echo site_url() ?>"> <img src="<?php echo base_url() ?>assets/bigshot/img/logo.png" alt=""></a> </div>
    <!-- Main Menu -->
    <ol id="menu">
      <li><a href="<?php echo site_url() ?>">Home</a></li>
      <li><a href="<?php echo site_url() ?>magazine">Magazine</a>
        <!-- sub menu -->
        <ol>
          <li><?php echo anchor('category', 'Category'); ?></li>
        </ol>
      </li>
      <!-- end sub menu -->
      <li><a href="<?php echo site_url() ?>gadget">Gadget</a>
        <!-- sub menu -->
        <ol>
          <li><?php echo anchor('brand', 'Brand'); ?></li>
        </ol>
      </li>
      </li>
      <li><a href="<?php echo site_url() ?>contact">Contact</a></li>
    </ol>
  </div>