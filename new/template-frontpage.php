	<?php 
	
	
	/*************
	 * Template Name: Front Page Template
	 *
	 * @package  		 SinglePro
	 * @file     		 template-frontpage.php
	 * @author   		 WpFreeware
	 * @Author Link 	 http://wpfreeware.com
	 * @license	 		 GPL v3 or later
	 * @license url: 	 http://www.gnu.org/licenses/gpl-3.0.html
	 ***************/	
	
	 get_header();
	
	?>

      
    <!--=========== Start Slider SECTION ================--> 	  
	<?php get_template_part('inc/templates/home-slider');?>
	<!--=========== End Slider SECTION ================--> 


    <!--=========== BEGIN ABOUT SECTION ================-->
	<?php get_template_part('inc/templates/about-us');?>
	<!--=========== END ABOUT SECTION ================-->
	

    <!--=========== BEGIN SERVICE SECTION ================-->
	<?php get_template_part('inc/templates/services');?>
	<!--=========== END SERVICE SECTION ================-->

    <!--=========== BEGAIN PORTFOLIO SECTION ================-->
	<?php get_template_part('inc/templates/portfolios');?>
    <!--=========== END PORTFOLIO SECTION ================-->

    <!--=========== BEGAIN TEAM SECTION ================-->
	<?php get_template_part('inc/templates/team-members');?>
	<!--=========== END TEAM SECTION ================-->


    <!--=========== BEGAIN PRICING SECTION ================-->
	<?php get_template_part('inc/templates/pricing-tables');?>
	<!--=========== END PRICING SECTION ================-->
	
    
	<!--=========== BEGAIN Blog SECTION ================-->
	<?php get_template_part('inc/templates/from-blog');?>
	<!--=========== END Blog SECTION ================-->	


    <!--=========== BEGAIN TESTIMONIAL SECTION ================-->
	<?php get_template_part('inc/templates/testimonials');?>
	<!--=========== END TESTIMONIAL SECTION ================-->


    <!--=========== BEGAIN CLIENTS SECTION ================-->
	<?php get_template_part('inc/templates/clients-logo');?>
	<!--=========== END CLIENTS SECTION ================-->

    <!--=========== BEGAIN CONTACT SECTION ================-->
	<?php get_template_part('inc/templates/contact-area');?>
	<!--=========== END CONTACT SECTION ================-->

    <!--=========== BEGAIN CONTACT INFO SECTION ================-->
	<?php get_template_part('inc/templates/contact-info');?>
	<!--=========== END CONTACT INFO SECTION ================-->

    <!--=========== BEGAIN SUBSCRIBE SECTION ================-->
	<?php get_template_part('inc/templates/subscribe');?>
	<!--=========== END SUBSCRIBE SECTION ================-->

	<?php get_footer();?>

	