<?php
/**
 * Template part for displaying posts
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
            <p class="h5 web-font font-weight-normal"><?= implode(" ", array_slice(explode(" ", get_the_excerpt()), 0, 6)) ?></p>
            <div class="byline-wrapper d-flex align-items-center my-3 py-2">
              <div class="content-info-byline-image mr-3">
                <img class="img-fluid" alt="image" title="image" src="<?= get_avatar_url(get_the_author_meta('ID')); ?>"
                  data-src="<?= get_avatar_url(get_the_author_meta('ID')); ?>"
                  data-sizes="auto" data-srcset="" sizes="40px">
              </div>
              <!-- end content info byline -->
              <div class="byline byline-post">By
                <a class="byline-name" href="#" data-vars-ga-ux-element="Byline"
                  data-vars-ga-call-to-action="<?= get_the_author_meta('display_name') ?>"><span class="byline-name"><?= get_the_author_meta('display_name') ?></span></a>
                <time class="content-info-date" datetime="<?= get_the_date(); ?>">
                  <?= get_the_date(); ?>
                </time>
              </div>
              <!-- end byline post -->
            </div>
            <!-- post byline wrapper -->
          </div>
          <!-- end post heading -->
          <div class="row">
            <div class="col-md-8">
              <div class="post-inner-content-wrapper ">
                <div class="inner-post-image mb-4">
                  <?php the_post_thumbnail(  ); ?>
                </div>
                <!-- end inner post image -->

              <?php the_content() ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="add-container">
                <?= wp_get_attachment_image(139, 'original'); ?>
              </div>
            </div>
          </div>
          
          <!-- end post inner content wrapper -->
          <div class="byline byline-post font-weight-bold">
            <a class="byline-name" href="/author/221293/Emily-Shiffer/" data-vars-ga-ux-element="Byline"
              data-vars-ga-call-to-action="Emily Shiffer"><span class="byline-name"><?= get_the_author_meta('display_name') ?></span></a>
            <span class="author-bio d-block pt-2"><?= get_the_author_meta('description'); ?></span>
          </div>
        </div>
    </div>
  
		<?php 
			$previous_post = get_previous_post();
			$next_post = get_next_post();
		?>

		<div class="read-next-wrapper mt-3 pb-4">
          <div class="row">
            <div class="col-12 mb-3">
              <h1 class="heading-with-line"><span>
                  <span class="text-primary">READ </span><span>NEXT</span>
                </span></h1>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
          <div class="row"><?php
          	if($previous_post){ ?>
	            <div class="col-12 col-md-6 mb-4 mb-md-0">
	              <div class="card card-next-items">
	                <a href="<?= get_post_permalink($previous_post->ID); ?>" class="card-image-container"><img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id( $previous_post->ID ), 'single-post-thumbnail' )[0]; ?>" class="card-img-top" alt=""></a>
	                <div class="card-body">
	                  <h5 class="card-post-title"><a class="card-post-link" href="<?= get_post_permalink($previous_post->ID); ?>"><?= $previous_post->post_title; ?></a></h5>
	                </div>
	                <!-- end card body -->
	              </div>
	              <!-- end card -->
	            </div><?php
        	} ?>
            <!-- end col --><?php
          	if($next_post){ ?>
	            <div class="col-12 col-md-6">
	              <div class="card card-next-items">
	                <a href="<?= get_post_permalink($next_post->ID); ?>" class="card-image-container"><img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id( $next_post->ID ), 'single-post-thumbnail' )[0]; ?>" class="card-img-top" alt=""></a>
	                <div class="card-body">
	                  <h5 class="card-post-title"><a class="card-post-link" href="<?= get_post_permalink($next_post->ID); ?>"><?= $next_post->post_title; ?></a></h5>
	                </div>
	                <!-- end card body -->
	              </div>
	              <!-- end card -->
	            </div><?php
        	} ?>
            <!-- end col -->
          </div>
          <!-- end row  -->
    </div>

    <div class="nutty-adds-wrapper">
      <h5>Sponsored Content From Around The Web</h5>
      <div class="row mb-3">
        <div class="col-md-3 nutty-col">
          <div class="nutty-add">
            <div>
              <img src="https://images.outbrainimg.com/transform/v3/eyJpdSI6ImQ4MjI4ODg0MmUxOGI4NTgxYTdkYmMyOGM1MWQ2NDM3MmRkYTU5YzM4MTk3OTlhM2I5ZTJhZTRmNWFmYzEzODkiLCJ3IjoyMTQsImgiOjEyOSwiZCI6MS41LCJjcyI6MCwiZiI6NH0.webp">
            </div>
            <span>Title of the Add Goes Here</span>
          </div>
        </div>
        <div class="col-md-3 nutty-col">
          <div class="nutty-add">
            <div>
              <img src="https://images.outbrainimg.com/transform/v3/eyJpdSI6IjFiYzI1ZDIxM2MyMGJjMTM4MjUyMTQwOWMyYmEyYzViNTNmMTFkYzhkYzJlMGFlMWIxZTU1NzliMDNmMTgyZjciLCJ3IjoyMTQsImgiOjEyOSwiZCI6MS41LCJjcyI6MCwiZiI6NH0.webp">
            </div>
            <span>Title of the Add Goes Here</span>
          </div>
        </div>
        <div class="col-md-3 nutty-col">
          <div class="nutty-add">
            <div>
              <img src="https://images.outbrainimg.com/transform/v3/eyJpdSI6ImYwMGRlYjgzODJkMWE0MjBjMmM2YjBkMDAyNjY4ZDJmMDNhZTNkZTg3YWU0ZTljYmI5YzhiMmM3MWZjNWFmZGEiLCJ3IjoyMTQsImgiOjEyOSwiZCI6MS41LCJjcyI6MCwiZiI6NH0.webp">
            </div>
            <span>Title of the Add Goes Here</span>
          </div>
        </div>
        <div class="col-md-3 nutty-col">
          <div class="nutty-add">
            <div>
              <img src="https://images.outbrainimg.com/transform/v3/eyJpdSI6ImUzYzYxZmRmMDQzMTE4Y2Q5Nzg5MWMzOGQ0ZWUzZmRkMmFhZDBiY2QzODI5MjUxOWJhODAwMDVjOTMxODAxNzciLCJ3IjoyMTQsImgiOjEyOSwiZCI6MS41LCJjcyI6MCwiZiI6NH0.webp">
            </div>
            <span>Title of the Add Goes Here</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 nutty-col">
          <div class="nutty-add">
            <div>
              <img src="https://images.outbrainimg.com/transform/v3/eyJpdSI6IjczNjhkNjFhOTBjMDQxZTEzYmRkOTIyYzE2NTk3OGRhNDcyYzg1Y2NkNzA3MzYwNDkxN2EzMmY1YmY4ZDc2ZDAiLCJ3IjoyMTQsImgiOjEyOSwiZCI6MS41LCJjcyI6MCwiZiI6NH0.webp">
            </div>
            <span>Title of the Add Goes Here</span>
          </div>
        </div>
        <div class="col-md-3 nutty-col">
          <div class="nutty-add">
            <div>
              <img src="https://images.outbrainimg.com/transform/v3/eyJpdSI6IjhmZWY5MmE1Yzg1OGNhZDlmMjNlMTYzOWY2NTI1ZWE1NzY1Njc4ZjFkMDM3YTY2NWY0ZDJhOTkyYWMwZmE1ZDEiLCJ3IjoyMTQsImgiOjEyOSwiZCI6MS41LCJjcyI6MCwiZiI6NH0.webp">
            </div>
            <span>Title of the Add Goes Here</span>
          </div>
        </div>
        <div class="col-md-3 nutty-col">
          <div class="nutty-add">
            <div>
              <img src="https://images.outbrainimg.com/transform/v3/eyJpdSI6IjBjYzVhZWM0MDBjZjM5ZDcxOWJlNzViMzAwZGE2ZmY1NzFhZjcxNmZhMDVmMGUzMmFhY2NjY2YwY2M4YjE4MmUiLCJ3IjoyMTQsImgiOjEyOSwiZCI6MS41LCJjcyI6MCwiZiI6NH0.webp">
            </div>
            <span>Title of the Add Goes Here</span>
          </div>
        </div>
        <div class="col-md-3 nutty-col">
          <div class="nutty-add">
            <div>
              <img src="https://images.outbrainimg.com/transform/v3/eyJpdSI6ImU5ZTYzYWRiYzViMDJlNjU1ZTQ5YTFjYTUyYTk2ZDQ2NWQ0ZTA5NmZjZDcyNWMwNjZiOTBiYmVlMjM0ZTg3YWUiLCJ3IjoyMTQsImgiOjEyOSwiZCI6MS41LCJjcyI6MCwiZiI6NH0.webp">
            </div>
            <span>Title of the Add Goes Here</span>
          </div>
        </div>
      </div>
    </div>


        <?php 
        	$category = get_the_category();
        	$args = array('posts_per_page' => 3, 'category'=> $category[0]->slug);
        	$query = new WP_Query($args);
        ?>
        <div class="read-more-wrapper mt-5 pb-4">
          <div class="row">
            <div class="col-12 mb-3 text-center">
              <span class="btn btn-sm btn-primary font-weight-bold">MORE FORM</span>
              <h1 class="heading-with-line"><span><?= $category[0]->name; ?></span></h1>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
          <div style="overflow: hidden;" class="row"> <?php

	          if($query->have_posts()){
	          	while ($query->have_posts()) {
	          		$query->the_post(); ?>
	          		<div class="col-12 overflow-hidden col-md-4 mb-4 pm-md-0">
		              <div class="card card-more-items">
		                <a href="<?= get_permalink() ?>" class="card-image-container"><?php the_post_thumbnail('medium'); ?></a>
		                <div class="card-body">
		                  <h5 class="card-post-title"><a class="card-post-link" href="<?= get_permalink() ?>"><?= get_the_title() ?></a></h5>
		                </div>
		                <!-- end card body -->
		              </div>
		              <!-- end card -->

		            </div><?php
	          	}
	          } ?>
            
          </div>
          <!-- end row -->
        </div>


</article><!-- #post-## -->
