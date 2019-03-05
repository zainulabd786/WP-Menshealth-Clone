<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

        
		<?php
		$count = 0;
    	$total = count($posts);
		if ( have_posts() ) : ?>
			<div class="feature-item-wrapper pt-4">
				<div class="row no-gutters"> <?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						if($count === 0){ ?>
							<div class="col-12 col-md-6 mb-4 mb-md-0 p-0">
				                <div class="card card-feature-items">
				                    <a href="<?= get_the_permalink(); ?>" class="card-image-container">
				                      <?php the_post_thumbnail('large'); ?>
				                      <span class="card-img-overlay d-flex align-items-end p-0">
				                          <span class="h4 d-inline-block bg-warning font-weight-bold py-3 px-4 mb-4">Last updated</span>
				                        </span>
				                    </a>
				                    <div class="card-body">
				                      <h4 class="card-post-title"><a class="card-post-link" href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a></h4>
				                    </div>
				                    <!-- end card body -->
				               	</div>
				                <!-- end card -->
				            </div><?php
						}

						if($count == 1){ ?>
							<div class="col-12 col-md-6 mb-4 mb-md-0 pl-0 pl-md-3 pr-0"><?php
						}


						if($count > 0 && $count < 4){ ?>
							<div class="card card-list-items">
				                <a href="<?= get_the_permalink(); ?>" class="card-image-container"><?php the_post_thumbnail('medium'); ?></a>
				                <div class="card-body">
				                  <h5 class="card-post-title"><a class="card-post-link" href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a></h5>
				                  <p class="card-post-text"><?= implode(" ", array_slice(explode(" ", get_the_excerpt()), 0, 20)) ?></p>
				                </div>
				                <!-- end card body -->
				            </div><?php
						}


						if($count == $total){ ?>
							</div><?php
						}
						$count++;
					endwhile; ?>
				</div>
			</div><?php
		endif;

		$fp = 1;
		if(have_posts()){
			while (have_posts()) {
				the_post();
				if($fp == 5){ ?>
					<div class="card card-with-add">
			            <a href="<?= get_the_permalink() ?>" class="card-image-container"><?php the_post_thumbnail('full'); ?></a>
			            <div class="card-body">
			              <div class="post-meta-item-wrapper">
			                <div class="post-meta-item">
			                  <a href="#" class="btn btn-sm btn-"><?= get_the_category(get_the_ID())[0]->name; ?></a>
			                </div>
			                <!-- end post meta item -->
			              </div>
			              <!-- end post meta item -->
			              <h4 class="card-post-title"><a class="card-post-link" href="<?= get_the_permalink() ?>"><?= get_the_title(); ?></a></h4>
			              <p class="card-post-text"><?= implode(" ", array_slice(explode(" ", get_the_excerpt()), 0, 20)) ?></p>
			              <div class="byline byline-listing"><span class="byline-author">By <a class="byline-name" href="#"><?= get_the_author_meta('display_name') ?></a></span>
			              </div>
			            </div>
			            <!-- end card body -->
			        </div><?php
				} 
		        $fp++;
			}
		}

		$c = 1;
		if(have_posts()){ ?>
			<div class="post-full-width mt-4"><?php
				while (have_posts()) {
					the_post();
					if($c > 4){
						$post_id = get_the_ID(); // or use the post id if you already have it
						$category_object = get_the_category($post_id);
						$category_name = $category_object[0]->name; ?>
						<div class="card">
				            <a href="<?= get_the_permalink() ?>" class="card-image-container"><?php the_post_thumbnail('medium'); ?></a>
				            <div class="card-body">
				              <div class="post-meta-item-wrapper">
				                <div class="post-meta-item">
				                  <a href="#" class="btn btn-sm btn-"><?= $category_name ?></a>
				                </div>
				                <!-- end post meta item -->
				              </div>
				              <!-- end post meta item -->
				              <h4 class="card-post-title"><a class="card-post-link" href="<?= get_the_permalink() ?>"><?= get_the_title(); ?></a></h4>
				              <p class="card-post-text"><?= implode(" ", array_slice(explode(" ", get_the_excerpt()), 0, 20)) ?></p>
				              <div class="byline byline-listing"><span class="byline-author">By <a class="byline-name" href="#"><?= get_the_author_meta('display_name') ?></a></span>
				              </div>
				            </div>
				            <!-- end card body -->
				        </div><?php
			    	}
					$c++;
				} ?>
			</div><?php
		}

		?>

<?php
get_footer();
