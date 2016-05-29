		<?php 
			global $singlepro_options;
			if(!empty($singlepro_options['subscribe_area'])) { ?>

				<section id="subscribe">
				  <div class="container">
					<div class="row">
					  <div class="col-lg-12 col-md-12">
						<!-- START SUBSCRIBE HEADING -->
						<div class="heading">
							
							<!--Title-->
							<?php 
								global $singlepro_options;
								if(!empty($singlepro_options['subscribe_title'])) { ?>
									<h2 class="wow fadeInLeftBig"><?php echo $singlepro_options['subscribe_title']?></h2>
							<?php } ?> 				  
						  
						  <!--Description-->
							<?php 
								global $singlepro_options;
								if(!empty($singlepro_options['subscribe_desc'])) { ?>
									<p><?php echo $singlepro_options['subscribe_desc']?></p>
							<?php } ?> 			  

						</div>
						<!-- BEGAIN SUBSCRIVE FORM -->

							<?php 
								global $singlepro_options;
								if(!empty($singlepro_options['mailchimp_shortcode'])) { ?>
								
								<div class="subscrive_group wow fadeInUp">
									<?php echo do_shortcode(''.$singlepro_options['mailchimp_shortcode'].'');?>
								</div>	
								
							<?php } ?> 
								
						
					  </div>
					</div>
				  </div>
				</section>			
			
		<?php } ?> 	