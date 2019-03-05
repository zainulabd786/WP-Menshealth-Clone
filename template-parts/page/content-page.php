<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<div class="post-full-width mt-4">
          <div class="post-heading">
            <h3 class="inner-post-title"><?= get_the_title(); ?></h3>
            <div class="byline-wrapper d-flex align-items-center my-3 py-2">
              <!-- end content info byline -->
              <!-- end byline post -->
            </div>
            <!-- post byline wrapper -->
          </div>
          <!-- end post heading -->
          <div class="post-inner-content-wrapper ">
            <div class="inner-post-image mb-4">
              <?php the_post_thumbnail(  ); ?>
            </div>
            <!-- end inner post image -->

         	<?php the_content() ?>
          </div>
          <!-- end post inner content wrapper -->
        </div>


</article><!-- #post-## -->
