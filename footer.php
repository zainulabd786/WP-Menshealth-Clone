<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

 </div>
      <!-- end container -->
    </main>
    <!-- end body container wrapper -->
    <footer class="footer-container bg-primary text-white py-4 mt-4">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-3 mb-4 mb-lg-0 d-flex flex-column flex-md-row flex-lg-column justify-content-between">
            <div class="footer-logo pt-2">
              <a href="#" class="mb-4 d-block">
                <!-- LOGO Goes Here -->
                <?php the_custom_logo(); ?>
              </a>
            </div>
            <!-- end footer logo -->
            <div class="footer-social-link">
              <ul class="nav">
                <li class="nav-item"><a href="#" class="nav-link"><i class="fab fa-facebook-f fa-1x"></i></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fab fa-instagram fa-1x"></i></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fab fa-twitter fa-1x"></i></a></li>
                <li class="nav-item"><a href="#" class="nav-link"><i class="fab fa-google fa-1x"></i></a></li>
              </ul>
            </div>
            <!-- end social link -->
          </div>
          <!-- end col -->
          <div class="col-12 col-lg-9 mb-4 mb-md-0">
            <div class="footer-menu">
              <?php wp_nav_menu(
                array(
                  'theme_location' => 'footer-top',
                  'menu_class'     => 'nav'
                )
              ); ?>
            </div>
            <!-- end footer menu -->
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
          <div class="col-12 mb-4 mt-0 mt-lg-4"><?php
            if ( is_active_sidebar( 'sidebar-2' ) ) {
              dynamic_sidebar( 'sidebar-2' );
            }?>
            <!--<p>
               <span class="footer-network-tagline d-block">A Part of Hearst Digital Media</span>
              <span class="footer-affiliate-disclosure d-block">
                Men's Health participates in various affiliate marketing programs, which means we may get paid
                commissions on editorially chosen products purchased through our links to retailer sites.
              </span><span class="copyright d-block">©2019 Hearst Magazine Media, Inc. All Rights Reserved.</span> </p> -->
          </div>
          <div class="col-12 col-lg-12">
            <?php wp_nav_menu(
                array(
                  'theme_location' => 'footer-bottom',
                  'menu_class'     => 'nav'
                )
              ); ?>
          </div>
        </div>
      </div>
  </div>
  </footer>
  <div id="searchoverlay" class="search-overlay">
    <div class="search-overlay-inner">
      <a href="#">
        <span class="search-overlay-close-button">
          <i class="fas fa-times"></i>
        </span>
      </a>
      <form class="search-form search-overlay-form" action="/search/">
        <input type="search" id="search-input" class="search-input" name="q" value="" placeholder="search" autocomplete="off">
        <label class="search-label" for="search-input">Type keyword(s) to search</label>
      </form>
      <div class="search-overlay-autosuggest">
        <ul class="search-overlay-autosuggest-list">
        </ul>
      </div>
    </div>
  </div>
</div>
  <!-- end page wrapper -->

  <?php wp_footer(); ?>
</body>

</html>
