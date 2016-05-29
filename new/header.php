<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>

    <!-- Basic Page Needs
    ================================================== -->	

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">	

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	<?php wp_head();?>
  </head>
  <body <?php body_class(); ?>> 
  
	
	<?php get_template_part('inc/templates/pre-loader');?>
	
					

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top <?php if(!is_front_page()) echo 'blog_menu'; ?>" role="navigation"> 
          <div class="container">
          <div class="navbar-header">
            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only"><?php _e('Toggle navigation','singlepro');?></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- LOGO -->
			<?php get_template_part('inc/templates/logo');?>
            
                   
          </div>
		  
          <div id="navbar" class="navbar-collapse collapse">
		  

			<?php /* Main menu navigation */
				
				if(is_front_page()) {
			
					wp_nav_menu( array(
					  'theme_location' => 'singlepro-home-menu',
					  'container' => false,
					  'fallback_cb' => '',
					  'menu_class' => 'nav navbar-nav navbar-right main_nav',
					  'menu_id' => 'top-menu'
					)
					
					);				
				
			} else {
				
					wp_nav_menu( array(
					  'theme_location' => 'singlepro-blog-menu',
					  'container' => false,
					  'menu_class' => 'nav navbar-nav navbar-right main_nav'
					  )
					);
				
			
			}
			
			?>				
			
			


			
          </div><!--/.nav-collapse -->
          </div>     
        </nav>  
      </div>
      <!-- END MENU -->
	  
	</header>
	
	
	<!--=========== End HEADER SECTION ================--> 