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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="main-page-wrapper" class="page-wrapper">


	<header id="header-container" class="header-container-wrapper"><?php
      if (is_front_page()) { ?>
        <div class="cover-story-wrapper position-relative">
          <div class="cover-story-logo position-absolute pt-4 pl-4">
            <a href="#" class="cover-story-logo-link">
              <?php the_custom_logo(); ?>
            </a>
          </div>
          <div class="cover-story-video">
            <?php the_custom_header_markup(); ?>
          </div>
          <!-- End cover story video -->
          <?php do_action("get_header_media_post_title"); ?>
        <!-- end cover-story-details wrapper -->
        </div>
        <!-- end cover story --> <?php 
      } ?>
      <nav id="main-navbar" class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container px-0">
          <a class="menu-toggler mr-4"><i class="fas fa-bars fa-2x"></i></a>
          <a class="navbar-brand" href="#">
              <?php the_custom_logo(); ?>
          </a>
          <div class="collapse navbar-collapse" id="">
            <?php wp_nav_menu(
              array(
                'theme_location' => 'top',
                'menu_id'        => 'top-menu',
                'menu_class'     => 'navbar-nav mr-auto'
              )
            ); ?>
          </div>
          <!-- end navbar-collapse -->
          <div class="navbar-nav nav-swipeable flex-row align-items-center ml-auto">
            <?php wp_nav_menu(
              array(
                'theme_location' => 'header-right',
                'menu_class'     => 'navbar-nav'
              )
            ); ?>
            <a class="nav-link nav-search-button d-none d-md-inline" href="#"><i class="fas fa-search"></i></a>
            <!-- <a class="nav-link location-choice" href="#"><i class="fas fa-globe-americas"></i> <span class="">US</span></a> -->
          </div>
          <!-- end nav swipeable -->
        </div>
        <!-- end container -->
      </nav>
      <!-- end navbar -->
      <nav id="sidebar-menu" class="sidebar-menu">
        <div class="close-menu text-right mb-2">
          <a href="#" class="d-inline-block p-0"><i class="fas fa-times fa-2x"></i></a>
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
