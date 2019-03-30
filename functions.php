<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
include_once get_template_directory() . '/admin-folder/admin/admin-init.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentyseventeen' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'twentyseventeen' ),
			'social' => __( 'Social Links Menu', 'twentyseventeen' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats',
		array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo',
		array(
			'width'      => 250,
			'height'     => 250,
			'flex-width' => true,
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	  */
	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

	// Load regular editor styles into the new block-based editor.
	add_theme_support( 'editor-styles' );

	// Load default block styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'home',
			'about'            => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact'          => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog'             => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file'       => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file'       => 'assets/images/sandwich.jpg',
			),
			'image-coffee'   => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file'       => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods'  => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name'  => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( twentyseventeen_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';

	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'twentyseventeen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'twentyseventeen' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf(
		'<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );

	$customize_preview_data_hue = '';
	if ( is_customize_preview() ) {
		$customize_preview_data_hue = 'data-hue="' . $hue . '"';
	}
	?>
	<style type="text/css" id="custom-theme-colors" <?php echo $customize_preview_data_hue; ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
	<?php
}
//add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );

/**
 * Enqueues scripts and styles.
 */
function twentyseventeen_scripts() {
	global $za_theme_opts;
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );

	// Theme block stylesheet.
	wp_enqueue_style( 'twentyseventeen-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'twentyseventeen-style' ), '1.1' );


	wp_enqueue_style( 'font-awesome', "https://use.fontawesome.com/releases/v5.7.2/css/all.css" );

	//custom js
	wp_enqueue_script( 'jQuery', get_theme_file_uri( '/assets/js/plugins/jquery.min.js' ), array() );
	wp_enqueue_script( 'custom-js', get_theme_file_uri( '/assets/js/script.js' ), array("jQuery") );
	wp_enqueue_script( 'visible-js', get_theme_file_uri( '/assets/js/jquery-visible-master/jquery.visible.min.js' ), array("jQuery") );
	wp_localize_script( 'custom-js', 'za_theme_opts', $za_theme_opts );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'twentyseventeen-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$twentyseventeen_l10n = array(
		'quote' => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$twentyseventeen_l10n['expand']   = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse'] = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']     = twentyseventeen_get_svg(
			array(
				'icon'     => 'angle-down',
				'fallback' => true,
			)
		);
	}

	wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

/**
 * Enqueues styles for the block-based editor.
 *
 * @since Twenty Seventeen 1.8
 */
function twentyseventeen_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'twentyseventeen-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ), array(), '1.1' );
	// Add custom fonts.
	wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'twentyseventeen_block_editor_styles' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			$sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'twentyseventeen_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Seventeen 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyseventeen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentyseventeen_widget_tag_cloud_args' );

/**
 * Get unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @since Twenty Seventeen 2.0
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @staticvar int $id_counter
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function twentyseventeen_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );





add_action( 'after_setup_theme', 'register_side_menu' );
function register_side_menu() {
  register_nav_menu( 'side-menu', __( 'Side Menu', 'twentyseventeen' ) );
}
add_action( 'after_setup_theme', 'register_footer_top' );
function register_footer_top() {
  register_nav_menu( 'footer-top', __( 'Footer Top', 'twentyseventeen' ) );
}
add_action( 'after_setup_theme', 'register_footer_bottom' );
function register_footer_bottom() {
  register_nav_menu( 'footer-bottom', __( 'Footer Bottom', 'twentyseventeen' ) );
}
add_action( 'after_setup_theme', 'register_header_right' );
function register_header_right() {
  register_nav_menu( 'header-right', __( 'Header Right', 'twentyseventeen' ) );
}


function get_header_media_post_title() {
	$count = 1;
	$args = array(
		'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page'=> 1,
        'order'=>'DESC',
        'orderby'=>'ID'
    );

    $the_query = new WP_Query( $args );

    // The Loop
    if ( $the_query->have_posts() ) {
        $not_in_next_three = array();
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
            if($count == 1){ ?>
	        	<div class="cover-story-details-wrapper d-flex justify-content-center">
			        <div class="cover-story-details head-post-padding text-center">
			          <span class="cover-story-label">
			            <?= get_the_category()[0]->name; ?>
			          </span>
			            <h2 class="cover-story-hed text-white"><a class="cover-story-hed-container" href="<?= get_permalink() ?>"><?= get_the_title() ?></a></h2>
			        </div>
			        <!-- end cover-story-details -->
			    </div><?php
			}
		    $count++;
        }

    }
    wp_reset_postdata();
}
add_action("get_header_media_post_title", "get_header_media_post_title");



function wptutsplus_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'textcolors' , array(
	    'title' =>  'Color Scheme',
	) );

	$txtcolors[] = array(
	    'slug'=>'main_color', 
	    'default' => '#e94114',
	    'label' => 'Main Color'
	);

	$txtcolors[] = array(
	    'slug'=>'main_text_color', 
	    'default' => '#fff',
	    'label' => 'Main Text Color'
	);
	 
	// secondary color ( site description, sidebar headings, h3, h5, nav links on hover )
	$txtcolors[] = array(
	    'slug'=>'heading_color', 
	    'default' => '#000',
	    'label' => 'Heading Color'
	);

	$txtcolors[] = array(
	    'slug'=>'text_color', 
	    'default' => '#000',
	    'label' => 'Text Color'
	);
	 
	// link color
	$txtcolors[] = array(
	    'slug'=>'link_color', 
	    'default' => '#000',
	    'label' => 'Link Color'
	);
	 
	// link color ( hover, active )
	$txtcolors[] = array(
	    'slug'=>'hover_link_color', 
	    'default' => '#e94114',
	    'label' => 'Link Color (on hover)'
	);

	// add the settings and controls for each color
	foreach( $txtcolors as $txtcolor ) {
	 
	    // SETTINGS
	    $wp_customize->add_setting(
	        $txtcolor['slug'], array(
	            'default' => $txtcolor['default'],
	            'type' => 'option', 
	            'capability' => 
	            'edit_theme_options'
	        )
	    );
	    // CONTROLS
	    $wp_customize->add_control(
	        new WP_Customize_Color_Control(
	            $wp_customize,
	            $txtcolor['slug'], 
	            array('label' => $txtcolor['label'], 
	            'section' => 'textcolors',
	            'settings' => $txtcolor['slug'])
	        )
	    );
	}
 
}
add_action( 'customize_register', 'wptutsplus_customize_register' );

function wptutsplus_customize_colors() {
	 /**********************
		text colors
		**********************/
	
	$main_color = get_option( 'main_color' );

	$main_text_color = get_option( 'main_text_color' );
	
	$heading_color = get_option( 'heading_color' );

	$text_color = get_option( 'text_color' );
	
	$link_color = get_option( 'link_color' );
	
	$hover_link_color = get_option( 'hover_link_color' );
	/****************************************
	styling
	****************************************/
	?>
	<style>
	 :root {
	/* Theme variable */
	--primary: <?= $main_color; ?>;
	--main_text_color: <?= $main_text_color; ?>;
	--heading_color: <?= $heading_color; ?>;
	--text_color: <?= $text_color; ?>;
	--link_color: <?= $link_color; ?>;
	--hover_link_color: <?= $hover_link_color; ?>;
}
	</style>
	     
	<?php
}
add_action( 'wp_head', 'wptutsplus_customize_colors' );


function card_with_add(){
	$args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'rand',
        'order' => 'DESC',
        'posts_per_page' => '1'
    );
    $query = new WP_Query ( $args );
    if($query->have_posts()){
    	while ( $query->have_posts () ) {
      		$query->the_post (); ?>
      		<div class="card card-with-add">
      			<div class="row">
      				<div class="col-md-8">
      					<a href="<?= get_permalink(); ?>" class="card-image-container" style="width: auto;height: auto;">
					   	<!-- <img src="image/lighthouse.jpg" class="card-img-top" alt=""> -->
					   	<div class="side-add">
						   	<?php the_post_thumbnail( array("740", "370") ); ?>
						</div>
					   </a>
					   <div class="card-body">
					      <div class="post-meta-item-wrapper">
					         <div class="post-meta-item">
					            <a href="#" class="btn btn-sm btn-"><?= get_the_category()[0]->name; ?></a>
					         </div>
					         <!-- end post meta item -->
					      </div>
					      <!-- end post meta item -->
					      <h4 class="card-post-title"><a class="card-post-link" href="<?= get_permalink(); ?>"><?= get_the_title() ?></a>
					      </h4>
					      <p class="card-post-text"><?= substr(get_the_excerpt(), 0, 100)."..."; ?>
					      </p>
					      <!-- <div class="byline byline-listing"><span class="byline-author">By <a class="byline-name" href="#">Paul
					         Schrodt</a></span>
					      </div> -->
					   </div>
      				</div>
      				<div class="col-md-4">
      					<?= wp_get_attachment_image(138, 'original'); ?>
      				</div>
      			</div>
			   <!-- end card body -->
			</div><?php
  		}
	}
}
add_action("card_with_add", "card_with_add");





/*function za_theme_activation(){
	$theme_opts = get_option("za_opts");
	if(!$theme_opts){
		$opts = array(
			"pin_video" => '',
			"category" => '',
			"link" => "",
			"title" => ""
		);
		add_option('za_opts', $opts);
	}

}
add_action("after_switch_theme", "za_theme_activation");*/


/*function za_admin_menus(){
	add_menu_page(
		"Pinned Video",
		"Pinned Video",
		"manage_options",
		"za_theme_opts",
		"za_theme_opts_page"
	);
}
add_action("admin_menu", "za_admin_menus");

function za_theme_opts_page(){ 
	$opts = get_option("za_opts");	?>
	<?php
			if(isset($_GET['status']) && $_GET['status'] == 1){ ?>
				<div style="padding: 10px;" class="notice notice-success is-dismissible">Success!</div><?php
			}
		?>
	<div class="wrap" style="display: flex; justify-content: center; align-items: center;">
		
		<form method="post" action="admin-post.php">
			<input type="hidden" name="action" value="za_pinned_video">
			<?php wp_nonce_field("za_pin_video_verfy"); ?>
			<table>
				<tr>
					<td><label>Pin Video URL</label></td>
					<td><input type="text" name="za_pin_video" value="<?= $opts['pin_video'] ?>"></td>
				</tr>
				<tr>
					<td><label>Category</label></td>
					<td>
						<select name="za_pin_category">
							<option>Select Category</option>
							<?php
								foreach (get_categories() as $category) { ?>
									<option <?= ($opts['category'] === $category->name ) ? "selected" : "" ?> value="<?= $category->name ?>"><?= $category->name ?></option><?php
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label>Link</label>
					</td>
					<td><input type="text" name="za_pin_video_link" value="<?= $opts['link'] ?>"></td>
				</tr>
				<tr>
					<td>
						<label>Title</label>
					</td>
					<td><input type="text" name="za_pin_video_title" value="<?= $opts['title'] ?>"></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="Submit"></td>
				</tr>
			</table>
		</form>
	</div><?php
}

add_action("admin_init", "za_admin_init");
function za_admin_init(){
	add_action("admin_post_za_pinned_video", "za_pinned_video");
}*/


/*function za_pinned_video(){
	if(!current_user_can('edit_theme_options')) wp_die('You are not allowed to be on this page');
	check_admin_referer("za_pin_video_verfy");

	$opts = get_option("za_opts");

	$opts['pin_video'] = $_POST['za_pin_video'];
	$opts['category'] = sanitize_text_field($_POST['za_pin_category']);
	$opts['link'] = $_POST['za_pin_video_link'];
	$opts['title'] = sanitize_text_field($_POST['za_pin_video_title']);

	update_option("za_opts", $opts);

	wp_redirect(admin_url('admin.php?page=za_theme_opts&status=1'));
}*/


// register the shortcode to wrap html around the content
/*function wptuts_responsive_video_shortcode( $atts ) {
    extract( shortcode_atts( array (
        'identifier' => ''
    ), $atts ) );
    return '<div class="wptuts-video-container"><iframe src="//www.youtube.com/embed/' . $identifier . '?modestbranding=1&rel=0" height="240" width="320" allowfullscreen="" frameborder="0"></iframe></div>
    <!--.wptuts-video-container-->';
}
add_shortcode ('responsive-video', 'wptuts_responsive_video_shortcode' );*/

