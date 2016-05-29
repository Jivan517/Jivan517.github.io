<?php 


add_action('wp_head', 'singlepro_section_bg_css');
function singlepro_section_bg_css() {

	
    global $singlepro_options; 
	
	// circular skill bg
	if(!empty($singlepro_options['circular_skill_bg'])) {
			
	$circular_bg_css = '<style type="text/css"> .skills_area{background-image: url('.$singlepro_options['circular_skill_bg']['url'].');}
	
	</style>';
	
	echo $circular_bg_css;			
	
	}
	
	// works skill bg
	if(!empty($singlepro_options['works_skill_counter_bg'])) {
			
	$works_counter_bg_css = '<style type="text/css"> .counter_section{background-image: url('.$singlepro_options['works_skill_counter_bg']['url'].');}
	
	</style>';
	
	echo $works_counter_bg_css;			
	
	}	
	
	// contact info bg
	if(!empty($singlepro_options['contact_info_area_bg'])) {
			
	$works_counter_bg_css = '<style type="text/css"> #contactFeature{background-image: url('.$singlepro_options['contact_info_area_bg']['url'].');}
	
	</style>';
	
	echo $works_counter_bg_css;			
	
	}


	// blog banner bg
	if(!empty($singlepro_options['blog_section_banner_img'])) {
			
	$blog_banner_bg_css = '<style type="text/css"> #blogBanner{background-image: url('.$singlepro_options['blog_section_banner_img']['url'].');}
	
	</style>';
	
	echo $blog_banner_bg_css;			
	
	}		
	

	
}


?>