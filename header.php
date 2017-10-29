<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php bloginfo('name'); ?></title>
<meta name="description" content="<?php bloginfo('description'); ?>" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>

  <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
<!--
  <p><img src = "http://agri.makejapan.jp/wp-content/uploads/2017/10/suisya.png" /></p>
-->
 
    <!-- ナビゲーションバー -->
  <div id="nav">
  <?php
    $args = array('theme_location' => 'navigation');
    wp_nav_menu( $args );
   ?>
  </div>
</header>