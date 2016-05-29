<?php

////////////////////////////////
// jquery scripts
/////////////////////////////////


function singlepro_scripts() {
  
  // comment ajax reply
  if ( is_singular() ) wp_enqueue_script( 'comment-reply' );  

  if ( is_front_page() ) {  }

	wp_enqueue_script( 'singlepro_wowjs', get_template_directory_uri() . '/js/wow.min.js', false, null, true );   
	wp_enqueue_script( 'singlepro_bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', false, null, true );
	if ( is_front_page() ) wp_enqueue_script( 'singlepro_home_slider', get_template_directory_uri() . '/js/jquery.superslides.min.js', false, null, true );
	if ( is_front_page() ) wp_enqueue_script( 'singlepro_slick', get_template_directory_uri() . '/js/slick.min.js', false, null, true );
	if ( is_front_page() ) wp_enqueue_script('singlepro_circlifuljs', "https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js", false, '', true);
	wp_enqueue_script( 'singlepro_customjs', get_template_directory_uri() . '/js/custom.js', false, null, true );
	
	
	// css styles
	
    // Register the style like this for a theme:
    wp_enqueue_style( 'singlepro_bootstrapmin', get_template_directory_uri() . '/css/bootstrap.min.css','all' );
    wp_enqueue_style( 'singlepro_fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css','all' );
	if ( is_front_page() ) wp_enqueue_style( 'singlepro_homeslider', get_template_directory_uri() . '/css/superslides.css','all' );
	if ( is_front_page() ) wp_enqueue_style( 'singlepro_slickslider', get_template_directory_uri() . '/css/slick.css','all' );
    wp_enqueue_style( 'singlepro_animation', get_template_directory_uri() . '/css/animate.css','all' );
    if ( is_front_page() ) wp_enqueue_style( 'singlepro_circliful','https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css','all' );
	wp_enqueue_style( 'singlepro_rtl', get_template_directory_uri() . '/rtl.css','all' );	
    wp_enqueue_style( 'main_style', get_template_directory_uri() . '/style.css','all' );
	
    // google fonts
	wp_enqueue_style( 'singlepro_googlefont_opensans','http://fonts.googleapis.com/css?family=Open+Sans','all' );
    wp_enqueue_style( 'singlepro_googlefont_varela','http://fonts.googleapis.com/css?family=Varela','all' );
    wp_enqueue_style( 'singlepro_googlefont_montserrat','http://fonts.googleapis.com/css?family=Montserrat','all' );	
 

}

if (!is_admin()) add_action("wp_enqueue_scripts", "singlepro_scripts", 11);

?>