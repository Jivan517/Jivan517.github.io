
										
						<?php 
							global $singlepro_options;
							if(!empty($singlepro_options['about_us_accd_3'])) { ?>
							
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h4 class="panel-title">
									  <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
										<span class="fa <?php echo $singlepro_options['about_us_accd_3_icon']?>"></span><?php echo $singlepro_options['about_us_accd_3']?>
									  </a>
									</h4>
								  </div>
								  <div id="collapseThree" class="panel-collapse collapse">
									<div class="panel-body">
										<?php echo $singlepro_options['about_us_accd_3_desc']?>
									</div>
								  </div>
								</div>	
							
						<?php } ?> 							