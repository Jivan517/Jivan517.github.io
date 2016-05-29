
											
						<?php 
							global $singlepro_options;
							if(!empty($singlepro_options['about_us_accd_1'])) { ?>
							
								<div class="panel panel-default">
								  <div class="panel-heading">
									<h4 class="panel-title">
									  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
										 <span class="fa <?php echo $singlepro_options['about_us_accd_1_icon']?>"></span><?php echo $singlepro_options['about_us_accd_1']?>
									  </a>
									</h4>
								  </div>
								  <div id="collapseOne" class="panel-collapse collapse in">
									<div class="panel-body">
										<?php echo $singlepro_options['about_us_accd_1_desc']?>
									</div>
								  </div>
								</div>
							
						<?php } ?> 						