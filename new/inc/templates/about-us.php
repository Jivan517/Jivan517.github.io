 
	
	
	<section id="about">

	<!--About us texts-->
    <?php 
		global $singlepro_options;
		if(!empty($singlepro_options['about_us_area'])) { ?>
			<?php get_template_part('inc/templates/about-us-texts');?>
    <?php } ?>   
	
	<!-- skill counter-->
    <?php 
		global $singlepro_options;
		if(!empty($singlepro_options['skill_counter'])) { ?>
			<?php get_template_part('inc/templates/about-skill-counter');?>
    <?php } ?>   
		
		
		
    </section>