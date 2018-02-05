<?php
/**
 * MRC 2017 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MRC_2017
 */

if ( ! function_exists( 'mrc_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mrc_setup() {
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
	add_image_size( 'project-small', 800, 600, true ); // slug, width, height, crop
	add_image_size( 'project-cover', 1280, 800 ); // slug, width, height, crop
	add_image_size( 'testimonial-headshot', 500, 500 ); // slug, width, height, crop

	/*
	 * Register multiple menus for theme
	 */
	function register_mrc_menus() {
	  register_nav_menus(
	    array(
	      'header-primary' => __( 'Header - Primary' ),
	      'footer-primary' => __( 'Footer - Primary' ),
	      'footer-social' => __( 'Footer - Social' ),
	      'footer-services' => __( 'Footer - Services' ),
	    )
	  );
	}
	add_action( 'init', 'register_mrc_menus' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mrc_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mrc_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mrc_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mrc' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mrc' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'mrc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mrc_scripts() {
	wp_enqueue_style( 'mrc-style', get_template_directory_uri() . '/assets/css/main-styles.css');
	
	// ALL OF THESE SCRIPTS ARE CONCATINATED & MINIFIED TO main-scripts-min.js USING CODEKIT
	// LEFT HERE TO KNOW WHAT IS BEING COMBINED FOR FUTURE REFERENCE
	// wp_enqueue_script( 'mrc-parallax', get_template_directory_uri() . '/assets/js/plugins/jquery.enllax.min.js', array('jquery'), '', true );
	// wp_enqueue_script( 'mrc-sticky', get_template_directory_uri() . '/assets/js/plugins/sticky-kit-min.js', array('jquery'), '', true );
	// wp_enqueue_script( 'mrc-waypoints', get_template_directory_uri() . '/assets/js/plugins/waypoints.min.js', array('jquery'), '', true );
	// wp_enqueue_script( 'mrc-popups', get_template_directory_uri() . '/assets/js/plugins/featherlight/featherlight.js', array('jquery'), '', true );
	// wp_enqueue_script( 'mrc-popups-gallery', get_template_directory_uri() . '/assets/js/plugins/featherlight/featherlight.gallery.js', array('jquery'), '', true );
	// wp_enqueue_script( 'mrc-scripts', get_template_directory_uri() . '/assets/js/main-scripts.js', array('jquery'), '', true );

	wp_enqueue_script( 'mrc-scripts', get_template_directory_uri() . '/assets/js/min/main-scripts-min.js', array('jquery'), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mrc_scripts' );




/*
 * Remove WPs call to jQuery so we can use Async or Defer on the scripts
 */
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );
function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.11.3' );
	}
}

/*
 * Defer scripts to load after HTML has rendered
 */
add_action( 'init', 'replace_jquery_src' );

/**
 * Modify loaded scripts
 */
function replace_jquery_src() {
    if ( ! is_admin() ) {

        // Remove the default jQuery
        wp_deregister_script( 'jquery' );
        wp_deregister_script( 'jquery-migrate.min' );

        // Register our own 'jquery' and 'jquery-migrate' and enqueue it
        wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3' );
        wp_enqueue_script( 'jquery' );

        wp_register_script( 'jquery-migrate.min', 'https://code.jquery.com/jquery-migrate-1.4.1.min.js', false, '1.4.1' );
        wp_enqueue_script( 'jquery-migrate.min' );
    }
}
add_filter( 'script_loader_tag', 'add_defer_attribute', 10, 3 );

/**
 * Scripts that are Defered are made here.
 */
function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array('jquery', 'jquery-migrate.min', 'mrc-scripts', 'contact-form-7');
   
   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer="defer" src', $tag);
      }
   }
   return $tag;
}

if ( ! function_exists( 'add_defer_to_cf7' ) ) {
	function add_defer_to_cf7( $url ) {
	    if ( // comment the following line out add 'defer' to all scripts
	    FALSE === strpos( $url, 'contact-form-7' ) or
	    FALSE === strpos( $url, '.js' )
	    )
	    { // not our file
	        return $url;
	    }
	    // Must be a ', not "!
	    return "$url' defer='defer";
	}
	add_filter( 'clean_url', 'add_defer_to_cf7', 11, 1 );
}


/**
 * Remove '?' from query strings to allow for caching on all servers
 */
function _remove_script_version( $src ){
	$parts = explode( '?ver', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );


/**
 * ACF Custom Theme Options
 */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		// 'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Contact Information',
		'menu_title'	=> 'Contact',
		'parent_slug'	=> 'general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Scripts & Styles',
		'menu_title'	=> 'Scripts & Styles',
		'parent_slug'	=> 'general-settings',
	));
}


/*
 * Remove wp-emoji Script and CSS from being loaded
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

function debug( $data ) {
    if ( is_array( $data ) )
        $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
    else
        $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
    echo $output;
}