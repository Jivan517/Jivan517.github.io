<?php 

/////////////////////////////////
// Singlepro post types
////////////////////////////////


	add_action('init', 'register_singlepro_post_type', 0);
	
	function register_singlepro_post_type() {
	
	// slider post type
	$slider_labels = array(
	'name' => __( 'Slider', 'singlepro' ),
	'singular_name' => __( 'Slide', 'singlepro' ),
	'add_new' => __( 'Add New Slide', 'singlepro' ),
	'add_new_item' => __( 'Add New Slide', 'singlepro' ),
	'edit_item' => __( 'Edit Slide', 'singlepro' ),
	'new_item' => __( 'New Slide', 'singlepro' ),
	'view_item' => __( 'View Slide', 'singlepro' ),
	'search_items' => __( 'Search Slide', 'singlepro' ),
	'not_found' => __( 'No Slide found', 'singlepro' ),
	'not_found_in_trash' => __( 'No Slide found in Trash', 'singlepro' ),
	'parent_item_colon' => __( 'Parent Slide:', 'singlepro' ),
	'menu_name' => __( 'Slides', 'singlepro' ),
	);
	$slider_args = array(
	'labels' => $slider_labels,
	'hierarchical' => false,
	'description' => __( 'Add your home page slides', 'singlepro' ),
	'supports' => array( 'title', 'thumbnail' ),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'menu_icon' => get_stylesheet_directory_uri(). '/img/icons/slider.png',
	'show_in_nav_menus' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => true,
	'has_archive' => false,
	'query_var' => true,
	'can_export' => true,
	'rewrite' => true,
	'capability_type' => 'post'
	);
	
	
	// Testimonial post type
	$testimonials_labels = array(
	'name' => __( 'Testimonials', 'singlepro' ),
	'singular_name' => __( 'Testimonial', 'singlepro' ),
	'add_new' => __( 'Add Testimonial', 'singlepro' ),
	'add_new_item' => __( 'Add Testimonial', 'singlepro' ),
	'edit_item' => __( 'Edit Testimonial', 'singlepro' ),
	'new_item' => __( 'New Testimonial', 'singlepro' ),
	'view_item' => __( 'View Testimonial', 'singlepro' ),
	'search_items' => __( 'Search Testimonial', 'singlepro' ),
	'not_found' => __( 'No Testimonial found', 'singlepro' ),
	'not_found_in_trash' => __( 'No Testimonial found in Trash', 'singlepro' ),
	'parent_item_colon' => __( 'Parent Testimonial:', 'singlepro' ),
	'menu_name' => __( 'Testimonials', 'singlepro' ),
	);
	
	$testimonials_args = array(
	'labels' => $testimonials_labels,
	'hierarchical' => false,
	'description' => __( 'Add your testimonials', 'singlepro' ),	
	'supports' => array( 'title', 'editor', 'thumbnail'),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'menu_icon' => get_stylesheet_directory_uri(). '/img/icons/testimonials.png',
	'show_in_nav_menus' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => true,
	'has_archive' => false,
	'query_var' => true,
	'can_export' => true,
	'rewrite' => true,
	'capability_type' => 'post'
	);	
	
	
	// services post type
	$services_labels = array(
	'name' => __( 'Services', 'singlepro' ),
	'singular_name' => __( 'Service', 'singlepro' ),
	'add_new' => __( 'Add New Service', 'singlepro' ),
	'add_new_item' => __( 'Add New Service', 'singlepro' ),
	'edit_item' => __( 'Edit Service', 'singlepro' ),
	'new_item' => __( 'New Service', 'singlepro' ),
	'view_item' => __( 'View Service', 'singlepro' ),
	'search_items' => __( 'Search Service', 'singlepro' ),
	'not_found' => __( 'No Service found', 'singlepro' ),
	'not_found_in_trash' => __( 'No Service found in Trash', 'singlepro' ),
	'parent_item_colon' => __( 'Parent Service:', 'singlepro' ),
	'menu_name' => __( 'Services', 'singlepro' ),
	);
	$services_args = array(
	'labels' => $services_labels,
	'hierarchical' => false,
	'description' => __( 'Add your service items', 'singlepro' ),	
	'supports' => array( 'title', 'editor' ),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'menu_icon' => get_stylesheet_directory_uri(). '/img/icons/services.png',
	'show_in_nav_menus' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => true,
	'has_archive' => false,
	'query_var' => true,
	'can_export' => true,
	'rewrite' => true,
	'capability_type' => 'post'
	);	
	
	
	// Team members post type
	$team_members_labels = array(
	'name' => __( 'Team Members', 'singlepro' ),
	'singular_name' => __( 'Member', 'singlepro' ),
	'add_new' => __( 'Add New Member', 'singlepro' ),
	'add_new_item' => __( 'Add New Member', 'singlepro' ),
	'edit_item' => __( 'Edit Member', 'singlepro' ),
	'new_item' => __( 'New Member', 'singlepro' ),
	'view_item' => __( 'View Member', 'singlepro' ),
	'search_items' => __( 'Search Member', 'singlepro' ),
	'not_found' => __( 'No Member found', 'singlepro' ),
	'not_found_in_trash' => __( 'No Member found in Trash', 'singlepro' ),
	'parent_item_colon' => __( 'Parent Member:', 'singlepro' ),
	'menu_name' => __( 'Team Members', 'singlepro' ),
	);
	$team_members_args = array(
	'labels' => $team_members_labels,
	'hierarchical' => false,
	'description' => __( 'Add your team members', 'singlepro' ),	
	'supports' => array( 'title', 'thumbnail' ),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'menu_icon' => get_stylesheet_directory_uri(). '/img/icons/team.png',
	'show_in_nav_menus' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => true,
	'has_archive' => false,
	'query_var' => true,
	'can_export' => true,
	'rewrite' => true,
	'capability_type' => 'post'
	);	
	
	// Pricing tables post type
	$pricing_tables_labels = array(
	'name' => __( 'Pricing Tables', 'singlepro' ),
	'singular_name' => __( 'Table', 'singlepro' ),
	'add_new' => __( 'Add New Table', 'singlepro' ),
	'add_new_item' => __( 'Add New Table', 'singlepro' ),
	'edit_item' => __( 'Edit Table', 'singlepro' ),
	'new_item' => __( 'New Table', 'singlepro' ),
	'view_item' => __( 'View Table', 'singlepro' ),
	'search_items' => __( 'Search Table', 'singlepro' ),
	'not_found' => __( 'No Table found', 'singlepro' ),
	'not_found_in_trash' => __( 'No Table found in Trash', 'singlepro' ),
	'parent_item_colon' => __( 'Parent Table:', 'singlepro' ),
	'menu_name' => __( 'Pricing Tables', 'singlepro' ),
	);
	$pricing_tables_args = array(
	'labels' => $pricing_tables_labels,
	'hierarchical' => false,
	'description' => __( 'Add pricing tables', 'singlepro' ),	
	'supports' => array( 'title'),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'menu_icon' => get_stylesheet_directory_uri(). '/img/icons/pricing.png',
	'show_in_nav_menus' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => true,
	'has_archive' => false,
	'query_var' => true,
	'can_export' => true,
	'rewrite' => true,
	'capability_type' => 'post'
	);		
	
	
	register_post_type( 'slider', $slider_args );
	register_post_type( 'services', $services_args );
	register_post_type( 'teammember', $team_members_args );
	register_post_type( 'pricing-tables', $pricing_tables_args );
	register_post_type( 'testimonials', $testimonials_args );

	
	} 

	



?>