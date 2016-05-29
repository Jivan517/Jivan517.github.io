      <!-- BEGAIN MILESTONE WORSK SECTION -->
	  
		<?php 
			global $singlepro_options;
			if(!empty($singlepro_options['works_counter'])) { ?>
			
			<section >
			
				<?php get_template_part('inc/templates/works-counter');?>
				
			</section>
		<?php } ?> 			
		
      <!-- END MILESTONE WORSK SECTION -->    

		<?php 
			global $singlepro_options;
			if(!empty($singlepro_options['portfolio_works_area'])) { ?>
			
			<section id="works">

			  <!-- BEGAIN FORTFOLIO WORKs SECTION -->
			  


					  <div class="row">
						<div class="portfolio_area">
						  <!-- BEGAIN PORTFOLIO HEADER -->
						  <div class="row">
							<div class="col-lg-12 col-md-12">
							 <div class="container">
								<div class="heading">
									<!--title-->
									<?php 
										global $singlepro_options;
										if(!empty($singlepro_options['portfolio_works_title'])) { ?>	
										
										<h2 class="wow fadeInLeftBig"><?php echo $singlepro_options['portfolio_works_title']?></h2>
										
									<?php } ?> 	
									
									<!--description-->
									<?php 
										global $singlepro_options;
										if(!empty($singlepro_options['portfolio_works_description'])) { ?>	
										
										<p><?php echo $singlepro_options['portfolio_works_description']?></p>
										
									<?php } ?> 	
									
								</div>
							  </div>
							</div>
						  </div>
						  <!-- END PORTFOLIO HEADER -->
							
						  <!-- BEGAIN PORTFOLIO GALLERY -->
						
							<div class="col-lg-12 col-md-12">
							 <div class="container">
								<?php echo do_shortcode('[codenovo-portfolio]');?>
							  </div>
							</div>	
							
						  <!-- END PORTFOLIO GALLERY -->
						  
						  
					  
						  
						  
						  
						  
						</div>         
					  </div>   			
					
				   
			  <!-- END FORTFOLIO WORSK SECTION -->
			  
			</section>
	
		<?php } ?> 	