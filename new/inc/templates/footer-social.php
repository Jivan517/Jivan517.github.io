             <div class="footer_right">
               <ul class="social_nav">
                 <!--facebook-->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['social_fb'])) { ?>
						<li><a href="<?php echo $singlepro_options['social_fb']?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
				<?php } ?> 	
				
                 <!--twitter-->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['social_twitter'])) { ?>
						<li><a href="<?php echo $singlepro_options['social_twitter']?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
				<?php } ?> 	

                 <!--Google+-->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['social_google'])) { ?>
						<li><a href="<?php echo $singlepro_options['social_google']?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
				<?php } ?> 					
				
                 <!--LinkedIn-->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['social_linkedin'])) { ?>
						<li><a href="<?php echo $singlepro_options['social_linkedin']?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
				<?php } ?> 	
				
               </ul>
             </div>