<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<!-- end add container -->
<div class="container">
	<div class="custom-video-wrapper py-4">
		
          <div class="custom-video-continer" id="featured-video">
            <!-- <img class="img-fluid" src="image/lighthouse.jpg" alt=""> -->
            <?php
            	if(wp_attachment_is_image($za_theme_opts['pin-media']['id'])){ ?>
            		<img class="img-fluid" src="$za_theme_opts['pin-media']['url']" alt=""><?php
            	}else{
            		echo do_shortcode('[video src="'.$za_theme_opts['pin-media']['url'].'" controls]');
            	}
            ?>
          </div>
          <!-- end custom video continer -->
          <div class="custom-video-content text-center px-md-4 py-4">
            <a class="custom-video-label mx-auto btn btn-primary" href="<?= $za_theme_opts['pin-media-link'] ?>"><?= get_cat_name($za_theme_opts['pin-media-category']) ?></a>
            <h2 class="custom-promo-title py-3 m-0"><a href="<?= $za_theme_opts['pin-media-link'] ?>"><?= $za_theme_opts['pin-media-title'] ?></a></h2>
            <!-- <div class="byline byline-listing"><span class="byline-author">By <a class="byline-name" href="#">Paul
                  Schrodt</a></span>
            </div> -->
          </div>
          <!-- end custom video content -->
    </div>

    <div class="post-full-width">

    	<!----------------------------------------------------------- POST WITH ADD --------------------------------------------------------->
    	<?php do_action("card_with_add"); ?>
    	<!----------------------------------------------------------- POST WITH ADD --------------------------------------------------------->

          <?php
          	$categories = get_categories(); 

          	$count = 1;
 
		    foreach ( $categories as $category ) {
		    	if($count > 2) break;
		 		$args = array(
				    'cat' => $category->term_id,
				    'post_type' => 'post',
				    'posts_per_page' => '1',
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) { 
          			while ( $query->have_posts() ) {
			 
			            $query->the_post();
			            $cat_link = get_category_link($category->cat_ID) ?>

			            <div id="post-<?php the_ID(); ?>" class="card">
				            <a href="#" class="card-image-container"><?php the_post_thumbnail( array("500", "300") ); ?></a>
				            <div class="card-body">
				              <div class="post-meta-item-wrapper">
				                <div class="post-meta-item">
				                  <a href="<?= $cat_link ?>" class="btn btn-sm btn-"><?php echo $category->name; ?></a>
				                </div>
				                <!-- end post meta item -->
				              </div>
				              <!-- end post meta item -->
				              <h4 class="card-post-title"><a class="card-post-link" href="<?= the_permalink() ?>"><?= get_the_title(); ?></a></h4>
				              <p class="card-post-text"><?= get_the_excerpt(); ?></p>
				              <div class="byline byline-listing"><span class="byline-author">By <a class="byline-name" href="#"><?= get_the_author(); ?></a></span>
				              </div>
				            </div>
				            <!-- end card body -->
				          </div>
			 
			        <?php } // end while 
			 
				} // end if
				$count++;
		    }
			// Use reset to restore original query.
			wp_reset_postdata();
          ?>

		<div class="collection-breaker-item-wrapper my-5">
		            <div class="collection-breaker-header py-3">
		              <h3><a href="#" class="collection-heading-title">Heart Health HQ</a></h3>
		            </div>
		            <div class="collection-breaker-container row no-gutter"><?php

		            	$args = array(
						    'category' => 'heart-health-hq',
						    'post_type' => 'post',
						    'posts_per_page' => '3',
						);
						$counter = 1;
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) { 
		          			while ( $query->have_posts() ) {
					 
					            $query->the_post(); ?>

					            <div class="col-12 col-md-4 <?= $counter === 3 ? '' : 'mb-4 mb-md-0' ?> p-0">
					                <div class="collection-breaker-item">
					                  <div class="collection-breaker-image">
					                    <a href="#" class="d-block">
					                      <?php the_post_thumbnail( array("500", "300") ); ?>
					                    </a>
					                  </div>
					                  <!-- end collection-breaker-image -->
					                  <div class="collection-breaker-content text-center">
					                    <div class="collection-breaker-title mx-auto p-3">
					                      <h5><a href="<?= the_permalink() ?>" class="d-block"><?= get_the_title(); ?></a> </h5>
					                    </div>
					                    <!-- end collection-breaker-title -->
					                  </div>
					                  <!-- end collection-breaker-content -->
					                </div>
					                <!-- end collection-breaker-item -->
					              </div>
					             <!-- end col -->
					           
					 
					        <?php $counter++; } // end while 
					 
						}
						wp_reset_postdata(); ?>
		            </div>
		            <!-- end collection-breaker-container  -->

		</div>

		<?php
          	$categories = get_categories(); 
 
		    foreach ( $categories as $category ) {
		 		$args = array(
				    'cat' => $category->term_id,
				    'post_type' => 'post',
				    'posts_per_page' => '1',
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) { 
          			while ( $query->have_posts() ) {
			            $query->the_post();
			            $cat_link = get_category_link($category->cat_ID); ?>

			            <div id="post-<?php the_ID(); ?>" class="card">
				            <a href="#" class="card-image-container"><?php the_post_thumbnail( array("500", "300") ); ?></a>
				            <div class="card-body">
				              <div class="post-meta-item-wrapper">
				                <div class="post-meta-item">
				                  <a href="<?= $cat_link ?>" class="btn btn-sm btn-"><?php echo $category->name; ?></a>
				                </div>
				                <!-- end post meta item -->
				              </div>
				              <!-- end post meta item -->
				              <h4 class="card-post-title"><a class="card-post-link" href="<?= the_permalink() ?>"><?= get_the_title(); ?></a></h4>
				              <p class="card-post-text"><?= get_the_excerpt(); ?></p>
				              <div class="byline byline-listing"><span class="byline-author">By <a class="byline-name" href="#"><?= get_the_author(); ?></a></span>
				              </div>
				            </div>
				            <!-- end card body -->
				          </div>
			 
			        <?php } // end while 
			 
				} // end if
		    }
			// Use reset to restore original query.
			wp_reset_postdata();
          ?>

    </div><!-- post-full-width mt-4 -->

<?php
get_footer();
