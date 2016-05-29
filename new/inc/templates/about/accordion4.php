
						
						
						<?php 
							global $singlepro_options;
							if(!empty($singlepro_options['about_us_accd_4'])) { ?>
							
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h4 class="panel-title">
									  <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
										<span class="fa <?php echo $singlepro_options['about_us_accd_4_icon']?>"></span><?php echo $singlepro_options['about_us_accd_4']?>
									  </a>
									</h4>
								  </div>
								  <div id="collapseFour" class="panel-collapse collapse">
									<div class="panel-body">
										<?php echo $singlepro_options['about_us_accd_4_desc']?>
									</div>
								  </div>
								</div>	
							
						<?php } ?> 								