
						
						
						<?php 
							global $singlepro_options;
							if(!empty($singlepro_options['about_us_accd_2'])) { ?>
							
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h4 class="panel-title">
									  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
										  <span class="fa <?php echo $singlepro_options['about_us_accd_2_icon']?>"></span><?php echo $singlepro_options['about_us_accd_2']?>
									  </a>
									</h4>
								  </div>
								  <div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body">
										<?php echo $singlepro_options['about_us_accd_2_desc']?>
									</div>
								  </div>
								</div>	
							
						<?php } ?> 							