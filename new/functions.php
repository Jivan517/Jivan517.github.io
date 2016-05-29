<?php 

// Load enqueue
include_once( 'inc/functions/enqueue.php' );

// Register Post types
include_once( 'inc/functions/post-types.php' );

//pagination
include_once( 'inc/functions/pagination.php' );


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since SinglePro 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 750;
}



if ( ! function_exists( 'singlepro_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 */
function singlepro_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 */
	load_theme_textdomain('singlepro', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	/*
	 * Custom background color/image support
	 */		
	add_theme_support( 'custom-background', array( 'default-color' => '#ffffff') );	
	


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	// featured image support
	add_theme_support( 'post-thumbnails');
	add_image_size( 'slide-images', 1000, 729, true ); // fullscreen slide images
	add_image_size( 'about-slide-images', 550, 350, true ); // about us slide images
	add_image_size( 'team-slide-images', 250, 250, true ); // team members slide images
	add_image_size( 'clients-slide-images', 210, 40, true ); // clients slide images
	add_image_size( 'portfolio-full-img', 550, 500, true ); // portfolio big images
	add_image_size( 'blog-thmub-img', 345, 250, true ); // blog img
	

	

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
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
	
	
	///////////////////////////
	// menu register
	///////////////////////////

	register_nav_menu( 'singlepro-home-menu', __( 'Home Menu', 'singlepro' ) );
	register_nav_menu( 'singlepro-blog-menu', __( 'Blog Menu', 'singlepro' ) );	
	


}
endif; // singlepro_setup
add_action( 'after_setup_theme', 'singlepro_setup' );




//////////////////////
// TGM activation
//////////////////////

require_once('inc/tgm/class-tgm-plugin-activation.php');
require_once('inc/tgm/plugins-required.php');


/////////////////////	
// sidebar register
/////////////////////

function singlepro_widget_areas() {
	
	register_sidebar( array(
		'name' => __( 'Post Sidebar', 'singlepro' ),
		'id' => 'post_sidebar',
		'description'   => __( 'Display your widgets in the post sidebar.', 'singlepro' ),
		'before_widget' => '<div class="single_blogsidebar">',
		'after_widget' => '</div>',
	    'before_title' => '<h2>',
	    'after_title' => '</h2>',
	) );	
	
	register_sidebar( array(
		'name' => __( 'Page Sidebar', 'singlepro' ),
		'id' => 'page_sidebar',
		'description'   => __( 'Display your widgets in the pages sidebar.', 'singlepro' ),		
		'before_widget' => '<div class="single_blogsidebar">',
		'after_widget' => '</div>',
	    'before_title' => '<h2>',
	    'after_title' => '</h2>',
	) );	
	
	
	
}
add_action('widgets_init', 'singlepro_widget_areas');



////////////////////////////////////
// added classes into post nav links
/////////////////////////////////////

add_filter('next_post_link', 'singlepro_post_link_attributes_next');
add_filter('previous_post_link', 'singlepro_post_link_attributes_previous');

function singlepro_post_link_attributes_next($output) {
    $injection = 'class="next_nav"';
    return str_replace('<a href=', '<a '.$injection.' href=', $output);
}

function singlepro_post_link_attributes_previous($output) {
    $injection = 'class="previous_nav"';
    return str_replace('<a href=', '<a '.$injection.' href=', $output);
}


/////////////////////////////////////
/// meta box
//////////////////////////////////////

add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
include_once( 'inc/metaboxes/ot-loader.php' );
include_once( 'inc/metaboxes/meta-boxes.php' );
include_once( 'inc/metaboxes/theme-options.php' );




////////////////////////
//  Framework
////////////////////////

if ( !class_exists( 'Framework' ) && file_exists( dirname( __FILE__ ) . '/inc/Framework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/inc/Framework/ReduxCore/framework.php' );
}
if ( !isset( $cybertech_options ) && file_exists( dirname( __FILE__ ) . '/inc/functions/singlepro-options.php' ) ) {
    require_once( dirname( __FILE__ ) . '/inc/functions/singlepro-options.php' );
}



// redux option panel icon
function newIconFont() {
    // Uncomment this to remove elusive icon from the panel completely
    wp_deregister_style( 'redux-elusive-icon' );
    wp_deregister_style( 'redux-elusive-icon-ie7' );
 
    wp_register_style(
        'redux-font-awesome',
        get_template_directory_uri() . '/css/font-awesome.min.css',
        array(),
        time(),
        'all'
    ); 
    wp_enqueue_style( 'redux-font-awesome' );
}

add_action( 'redux/page/singlepro_options/enqueue', 'newIconFont');





//background images/colors
include_once( 'inc/functions/section_bg_css.php' );
// colors
include_once( 'inc/functions/singlepro-themes.php' );


/////////////////////
// backend css
/////////////////////


function singlepro_adminpanel_style() {
	echo '<link href="'.get_template_directory_uri() .'/css/backend/singlepro-backend.css" rel="stylesheet" media="screen">';
}
add_action('admin_head', 'singlepro_adminpanel_style');	



?>