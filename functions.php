<?php
/**
 * Alpha West functions and definitions
 *
 * @package Alpha West
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'alpha_west_2_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function alpha_west_2_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Alpha West, use a find and replace
	 * to change 'alpha-west-2' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'alpha-west-2', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'alpha-west-2' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'alpha_west_2_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
}
endif; // alpha_west_2_setup
add_action( 'after_setup_theme', 'alpha_west_2_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function alpha_west_2_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'alpha-west-2' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'alpha_west_2_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function alpha_west_2_scripts() {
	wp_enqueue_style( 'alpha-west-2-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'alpha_west_2_scripts' );

/**
 * Load Foundation Scripts.
 */
function foundation_js(){

    wp_register_script( 'base_js', get_template_directory_uri() . '/bower_components/foundation/js/foundation.min.js' ); 
    wp_enqueue_script( 'base_js', 'jQuery', '','', true );

    wp_register_script( 'modern_js', get_template_directory_uri() . '/bower_components/modernizr/modernizr.js' ); 
    wp_enqueue_script( 'modern_js', 'jQuery', '','', true );  
 
    wp_register_script( 'rem_js', get_template_directory_uri() . '/js/rem.min.js' ); 
    wp_enqueue_script( 'rem_js', 'jQuery', '','', true ); 

    wp_register_script( 'page_background', get_template_directory_uri() . '/js/page_background.js' ); 
    wp_enqueue_script( 'page_background', 'jQuery', '','', true ); 
    
    wp_register_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js' ); 
    wp_enqueue_script( 'masonry', 'jQuery', '','', true );         
    
    wp_register_script( 'imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js' ); 
    wp_enqueue_script( 'imagesloaded', 'jQuery', '','', true );         

    wp_register_script( 'classie', get_template_directory_uri() . '/js/classie.js' ); 
    wp_enqueue_script( 'classie', 'jQuery', '','', true );     

    wp_register_script( 'AnimOnScroll', get_template_directory_uri() . '/js/AnimOnScroll.js' ); 
    wp_enqueue_script( 'AnimOnScroll', 'jQuery', '','', true ); 

    wp_register_script( 'uisearch_js', get_template_directory_uri() . '/js/uisearch.js' ); 
    wp_enqueue_script( 'uisearch_js', 'jQuery', '','', true ); 
    
    wp_register_script( 'svgeezy_js', get_template_directory_uri() . '/js/svgeezy.min.js' ); 
    wp_enqueue_script( 'svgeezy_js', 'jQuery', '','', true ); 
        
    wp_register_script( 'scripts_js', get_template_directory_uri() . '/js/scripts.js' ); 
    wp_enqueue_script( 'scripts_js', 'jQuery', '','', true );  
}

/**
 * Custom Page Excerpts.
 */
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

/**
 * Increase upload size
 */
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );

/**
 * Minify HTML.
 */
 include get_template_directory() . '/inc/functions/minify.php';

/**
 * Register User Contact Methods
 */
function custom_user_contact_methods( $user_contact_method ) {

	$user_contact_method['facebook'] = 'Facebook Username';
	$user_contact_method['twitter'] = 'Twitter Username';
	$user_contact_method['gplus'] = 'Google Plus';
	$user_contact_method['skype'] = 'Skype Username';
	$user_contact_method['LinkedIn'] = 'LinkedIn Userrname';
	return $user_contact_method; ;
}

// Hook into the 'user_contactmethods' filter
add_filter( 'user_contactmethods', 'custom_user_contact_methods' );

/**
 * Clean The Head.
 */
function clean_the_head() {
remove_action( 'wp_head', 'feed_links_extra'); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links'); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
}

/**
 * Allow redirection, even if my theme starts to send output to the browser.
 */
add_action('init', 'do_output_buffer');
function do_output_buffer() {
        ob_start();
}

/**
 * Foundation Menu Bar
 */
function foundation_top_bar_l() {
    wp_nav_menu(array( 
        'container' => false,                           // remove nav container
        'container_class' => '',           				// class of container
        'menu' => '',                      	        	// menu name
        'menu_class' => 'top-bar-menu left',         	// adding custom nav class
        'theme_location' => 'primary',               	// where it's located in the theme
        'before' => '',                                 // before each link <a> 
        'after' => '',                                  // after each link </a>
        'link_before' => '<span>',                            // before each link text
        'link_after' => '</span>',                             // after each link text
        'depth' => 5,                                   // limit the depth of the nav
				'fallback_cb' => false,                         // fallback function (see below)
        'walker' => new top_bar_walker()
	));
}

/**
 * Contact Widget.
 */
 include get_template_directory() . '/inc/functions/contact-widget.php';

/**
 * Walker Extension.
 */
 include get_template_directory() . '/inc/functions/walker.php';

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
