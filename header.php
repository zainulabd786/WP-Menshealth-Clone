<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<?php global $za_theme_opts; ?>
</head>
<body <?php body_class(); ?>>
<div id="main-page-wrapper" class="page-wrapper">


	<header id="header-container" class="header-container-wrapper"><?php
      if (is_front_page()) { ?>
        <div class="cover-story-wrapper position-relative mobile-head">
          <div class="cover-story-logo position-absolute pt-4 pl-4 <?= ($za_theme_opts['show-header-post'] != '1') ? 'big-logo-position' : '' ?>">
            <a href="#" class="cover-story-logo-link">
              <?php the_custom_logo(); ?>
            </a>
          </div>
          <div class="cover-story-video">
            <?php the_custom_header_markup(); ?>
          </div>
          <!-- End cover story video -->
          <?php
            if($za_theme_opts['show-header-post'] == '1') do_action("get_header_media_post_title"); 
          ?>
        <!-- end cover-story-details wrapper -->
        </div>
        <!-- end cover story --> <?php 
      } ?>
      <nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container justify-content-start justify-content-md-between px-0">
          <a class="menu-toggler mr-2 mr-md-4"><i class="fas fa-bars fa-2x"></i></a>
          <div class="d-none d-md-block">
              <?php the_custom_logo(); ?>
          </div>
          <div class="custom-collapse" id="">
            <?php wp_nav_menu(
              array(
                'theme_location' => 'top',
                'menu_id'        => 'top-menu',
                'menu_class'     => 'header-left navbar-nav flex-row mr-auto'
              )
            ); ?>
          </div>
          <!-- end navbar-collapse -->
          <div class="navbar-nav nav-swipeable flex-row align-items-center ml-auto">
            <?php wp_nav_menu(
              array(
                'theme_location' => 'header-right',
                'menu_class'     => 'navbar-nav d-none d-md-flex flex-row'
              )
            ); ?>
            <a class="nav-link nav-search-button d-inline" href="#"><i class="fas fa-search"></i></a>
            <!-- <a class="nav-link location-choice" href="#"><i class="fas fa-globe-americas"></i> <span class="">US</span></a> -->
          </div>
          <!-- end nav swipeable -->
        </div>
        <!-- end container -->
      </nav>
      <!-- end navbar -->
      <nav id="sidebar-menu" class="sidebar-menu">
        <div class="close-menu text-right">
          <a href="#" class="close-menu-icon d-inline-block p-0"></a>
        </div>
        <div class="menu-search">
          <a href="#" class="nav-search-button"><i class="fas fa-search"></i> search </a>
        </div>
        <?php wp_nav_menu(
              array(
                'theme_location' => 'side-menu',
                'menu_id'        => 'top-menu',
                'menu_class'     => 'nav flex-column'
              )
            ); ?>
        <!-- <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">Active</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul> -->
      </nav>
    </header>
    <main class="body-container-wrapper">
      <div class="container">
        <div class="top-listed-post-wrapper mb-4">
                <?php 
                  $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => '5',
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) { 
                            while ( $query->have_posts() ) {
                   
                              $query->the_post(); ?>

                              <div class="top-listed-post-items">
                                <a href="<?= the_permalink(); ?>" class="top-listed-post-link w-100">
                                  <span class="top-listed-post-items-image post-image-hover d-block">
                                   <?php the_post_thumbnail('medium'); ?>
                                  </span>
                                  <!-- end top listed-post items image -->
                                  <span class="top-listed-post-title d-flex align-items-start">
                                    <?= get_the_title(); ?>
                                  </span>
                                  <!-- end top listed post title -->
                                </a>
                                <!-- end top listed post link -->
                              </div>
                   
                          <?php } // end while 
                    } // end if
                    wp_reset_postdata();
                ?>      
                      <!-- end top listed post items -->
          </div>    
        </div> 
         
          <div class="addsen-container">
            <?php 
              if($za_theme_opts['show-custom-add'] == "0"){
                echo wp_get_attachment_image(137, 'original'); 
              } else{
                echo $za_theme_opts['custom-add-content'];
              }
            ?>
          </div>

    	<div class="container">


