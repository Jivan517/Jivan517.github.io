<?php
/**
 * Initialize the custom Meta Boxes. 
 */
add_action( 'admin_init', 'custom_meta_boxes' );

/**
 * Meta Boxes demo code.
 *
 * You can find all the available option types in demo-theme-options.php.
 *
 * @return    void
 * @since     2.0
 */
function custom_meta_boxes() {
  
  /**
   * Create a custom meta boxes array that we pass to 
   * the OptionTree Meta Box API Class.
   */
  $services_meta_box = array(
    'id'          => 'services_meta_boxs',
    'title'       => __( 'Service Settings', 'singlepro' ),
    'desc'        => '',
    'pages'       => array( 'services' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Icon code', 'singlepro' ),
        'id'          => 'service_item_icon',
        'type'        => 'text',
        'desc'        => __( 'Put Font-Awesome (v4.3.0) icon class here without <strong>fa</strong>. Default is <strong>fa-envelope-o</strong>. Ex: fa-barcode. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Get icon codes</a>', 'singlepro' )
      ),
      array(
        'label'       => 'Animation',
        'id'          => 'service_item_animation',
        'type'        => 'radio',
        'desc'        => 'Choose service item animation. Two animations are available to choose from Fade-in-left & Fade-in-right.',
        'choices'     => array(
          array(
            'label'       => 'Fade In Left',
            'value'       => 'fadeInLeft'
          ),
          array(
            'label'       => 'Fade In Right',
            'value'       => 'fadeInRight'
          )
        ),
        'std'         => 'fadeInLeft',
        'post_type'   => 'services',
      )	  
    )
  );
  
  
  $team_members_meta_box = array(
    'id'          => 'team_members_meta_boxs',
    'title'       => __( 'Member informations', 'singlepro' ),
    'desc'        => '',
    'pages'       => array( 'teammember' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Member Position', 'singlepro' ),
        'id'          => 'member_position',
        'type'        => 'text',
        'desc'        => __( 'Write this member position here. Ex: Founder, CEO etc.', 'singlepro' )
      ),	
      array(
        'label'       => __( 'Member Bio', 'singlepro' ),
        'id'          => 'member_bio',
        'type'        => 'textarea-simple',
        'desc'        => __( 'Write a brief description about this member.', 'singlepro' ),
		'rows'        => '5'
      ),
      array(
        'label'       => 'member_social_link_msg',
        'id'          => 'member_msg',
        'type'        => 'textblock',
        'desc'        => '<div style="padding:20px;background:#F1F1F1;font-weight:bold;"><h2>Member Social Links</h2><span style="background:#F1F1F1;font-weight:bold;">Put upto 4 any social links & social icons below. The links fields are mandatory for displaying social buttons. If you leave link field empty then social button will not visible. Font-Awesome (V4.3.0) icons are available to choose from for social icons. <a href="http://fortawesome.github.io/Font-Awesome/icons/" target="_blank">Get social icon codes</a></span></div>',
        'post_type'   => 'teammember'
      ),	  
      array(
        'label'       => __( 'Social-1 Icon', 'singlepro' ),
        'id'          => 'social_icon_1',
        'type'        => 'text',
        'desc'        => __( 'Put any social icon code here from Font-Awesome without <strong>fa</strong>. Ex: fa-facebook.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Social-1 Link', 'singlepro' ),
        'id'          => 'social_link_1',
        'type'        => 'text',
        'desc'        => __( 'Put social profile link here.', 'singlepro' )
      ),	  
      array(
        'label'       => __( 'Social-2 Icon', 'singlepro' ),
        'id'          => 'social_icon_2',
        'type'        => 'text',
        'desc'        => __( 'Put any social icon code here from Font-Awesome without <strong>fa</strong>. Ex: fa-facebook.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Social-2 Link', 'singlepro' ),
        'id'          => 'social_link_2',
        'type'        => 'text',
        'desc'        => __( 'Put social profile link here.', 'singlepro' )
      ),	  
      array(
        'label'       => __( 'Social-3 Icon', 'singlepro' ),
        'id'          => 'social_icon_3',
        'type'        => 'text',
        'desc'        => __( 'Put any social icon code here from Font-Awesome without <strong>fa</strong>. Ex: fa-facebook.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Social-3 Link', 'singlepro' ),
        'id'          => 'social_link_3',
        'type'        => 'text',
        'desc'        => __( 'Put social profile link here.', 'singlepro' )
      ),	  
      array(
        'label'       => __( 'Social-4 Icon', 'singlepro' ),
        'id'          => 'social_icon_4',
        'type'        => 'text',
        'desc'        => __( 'Put any social icon code here from Font-Awesome without <strong>fa</strong>. Ex: fa-facebook.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Social-4 Link', 'singlepro' ),
        'id'          => 'social_link_4',
        'type'        => 'text',
        'desc'        => __( 'Put social profile link here.', 'singlepro' )
      )		


	  
    )
  );
  
  
  
  $pricing_tables_meta_box = array(
    'id'          => 'pricing_tables_meta_boxs',
    'title'       => __( 'Pricing table features', 'singlepro' ),
    'desc'        => '',
    'pages'       => array( 'pricing-tables' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Price', 'singlepro' ),
        'id'          => 'table_price',
        'type'        => 'text',
        'desc'        => __( 'Put your desire price.Ex: $25', 'singlepro' )
      ),
      array(
        'label'       => __( 'Price/Per Month', 'singlepro' ),
        'id'          => 'table_price_permonth',
        'type'        => 'text',
        'desc'        => __( 'Put items or dates or anything else you want to set for selected dollars. Ex: Per Month/ Per 100 Items etc.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Field 1', 'singlepro' ),
        'id'          => 'table_price_field1',
        'type'        => 'text',
        'desc'        => __( 'Write your product any feature here.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Field 2', 'singlepro' ),
        'id'          => 'table_price_field2',
        'type'        => 'text',
        'desc'        => __( 'Write your product any feature here.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Field 3', 'singlepro' ),
        'id'          => 'table_price_field3',
        'type'        => 'text',
        'desc'        => __( 'Write your product any feature here.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Field 4', 'singlepro' ),
        'id'          => 'table_price_field4',
        'type'        => 'text',
        'desc'        => __( 'Write your product any feature here.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Field 5', 'singlepro' ),
        'id'          => 'table_price_field5',
        'type'        => 'text',
        'desc'        => __( 'Write your product any feature here.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Field 6', 'singlepro' ),
        'id'          => 'table_price_field6',
        'type'        => 'text',
        'desc'        => __( 'Write your product any feature here.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Field 7', 'singlepro' ),
        'id'          => 'table_price_field7',
        'type'        => 'text',
        'desc'        => __( 'Write your product any feature here.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Field 8', 'singlepro' ),
        'id'          => 'table_price_field8',
        'type'        => 'text',
        'desc'        => __( 'Write your product any feature here.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Field 9', 'singlepro' ),
        'id'          => 'table_price_field9',
        'type'        => 'text',
        'desc'        => __( 'Write your product any feature here.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Field 10', 'singlepro' ),
        'id'          => 'table_price_field10',
        'type'        => 'text',
        'desc'        => __( 'Write your product any feature here.', 'singlepro' )
      ),
      array(
        'label'       => __( 'Table Button Text', 'singlepro' ),
        'id'          => 'table_price_btn_text',
        'type'        => 'text',
        'desc'        => __( 'Put your desire table button text. Ex: Select Plan', 'singlepro' )
      ),
      array(
        'label'       => __( 'Table Button Link', 'singlepro' ),
        'id'          => 'table_price_btn_url',
        'type'        => 'text',
        'desc'        => __( 'Put your table button target link. Button will be invisible if you don\'t put your target link here. Ex: http://google.com', 'singlepro' )
      ),	  
      array(
        'label'       => 'Featured Table (Optional)',
        'id'          => 'pricing_table_featured',
        'type'        => 'checkbox',
        'desc'        => 'Check this field if you want to featured this pricing table.',
        'choices'     => array(
          array (
            'label'       => 'Featured',
            'value'       => 'Featured'
          )
        ),
        'std'         => '',
        'post_type'   => 'pricing-tables'
      ),	  
    )
  );  
    
  
  
  $slider_meta_box = array(
    'id'          => 'slider_meta_boxs',
    'title'       => __( 'Slide Informations', 'singlepro' ),
    'desc'        => '',
    'pages'       => array( 'slider' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(
      array(
        'label'       => __( 'Description', 'singlepro' ),
        'id'          => 'slide_desc',
        'type'        => 'textarea-simple',
        'desc'        => __( 'Write a short description about the slide.', 'singlepro' ),
		'rows'        => '5'
      ),
      array(
        'label'       => __( 'Slide Link Text', 'singlepro' ),
        'id'          => 'slide_link_text',
        'type'        => 'text',
        'desc'        => __( 'Put the slide Button link text here. Ex: Read More', 'singlepro' ),
      ),	  
      array(
        'label'       => __( 'Slide Link', 'singlepro' ),
        'id'          => 'slide_link',
        'type'        => 'text',
        'desc'        => __( 'Put the slide target link here.', 'singlepro' ),
      ),
      array(
        'id'          => 'slide_target_link',
        'label'       => __( 'Slide Link Target', 'singlepro' ),
        'desc'        => __( 'Select slide link target between new or same window. Default is Same window.', 'singlepro' ),
        'std'         => '_self',
        'type'        => 'radio',
        'choices'     => array( 
          array(
            'value'       => '_self',
            'label'       => __( 'Current Window', 'singlepro' )
          ),
          array(
            'value'       => '_blank',
            'label'       => __( 'New Window', 'singlepro' )
          )
        )
      )	  
    )
  ); 

  
    $testimonial_meta_box = array(
    'id'          => 'testimonial_meta_boxs',
    'title'       => __( 'Client Info', 'singlepro' ),
    'desc'        => 'This info will appear just below the client name in the testimonial section.',
    'pages'       => array( 'testimonials' ),
    'context'     => 'normal',
    'priority'    => 'high',
    'fields'      => array(	
      array(
        'label'       => __( 'Position Or URL', 'singlepro' ),
        'id'          => 'testimonials_client_position',
        'type'        => 'text',
        'desc'        => __( 'Put this client designation or website url or something else you like to display below his/her name.', 'singlepro' )
      )
	  
    )
  ); 
  
  
  /**
   * Register our meta boxes using the 
   * ot_register_meta_box() function.
   */
  if ( function_exists( 'ot_register_meta_box' ) )
    ot_register_meta_box( $slider_meta_box );
    ot_register_meta_box( $services_meta_box );
    ot_register_meta_box( $team_members_meta_box );
    ot_register_meta_box( $pricing_tables_meta_box );
    ot_register_meta_box( $testimonial_meta_box );

}