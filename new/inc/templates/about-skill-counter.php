       <!-- BEGAIN SKILLS  -->
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="skills_area">
              <div class="slider_overlay"></div>
              <div class="container">               
                <div class="skills">
                 <div class="heading">
            
					<?php 
						global $singlepro_options;
						if(!empty($singlepro_options['circular_skill_counter_title'])) { ?>
							<h3 class="wow fadeInDown"><?php echo $singlepro_options['circular_skill_counter_title']?></h3> 
					<?php } ?> 						
					
                  </div>
				  
				  
                  <!-- START SINGLE SKILL-->	

					<?php 
						//global $singlepro_options;
						if(!empty($singlepro_options['circular_skill_counter1_percentage'])) { ?>
						
						  <div class="col-lg-3 col-md-3 col-sm-3">
						   <div class="single_skill wow fadeInUp">
							 <div id="myStat" data-dimension="150" data-text="<?php echo $singlepro_options['circular_skill_counter1_percentage']?>%" data-info="" data-width="10" data-fontsize="25" data-percent="<?php echo $singlepro_options['circular_skill_counter1_percentage']?>" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
							  <h4><?php echo $singlepro_options['circular_skill_counter1_deptName']?></h4>                      
							</div>
						  </div>
						  
					<?php } ?> 						
				  

                  <!-- START SINGLE SKILL-->	

					<?php 
						//global $singlepro_options;
						if(!empty($singlepro_options['circular_skill_counter2_percentage'])) { ?>
						
						  <div class="col-lg-3 col-md-3 col-sm-3">
							<div class="single_skill wow fadeInUp">
							  <div id="myStathalf2" data-dimension="150" data-text="<?php echo $singlepro_options['circular_skill_counter2_percentage']?>%" data-info="" data-width="10" data-fontsize="25" data-percent="<?php echo $singlepro_options['circular_skill_counter2_percentage']?>" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
							  <h4><?php echo $singlepro_options['circular_skill_counter2_deptName']?></h4>
							</div>
						  </div>
						  
					<?php } ?> 						

                  <!-- START SINGLE SKILL-->
										
					<?php 
						//global $singlepro_options;
						if(!empty($singlepro_options['circular_skill_counter3_percentage'])) { ?>
						
						  <div class="col-lg-3 col-md-3 col-sm-3">                 
							<div class="single_skill wow fadeInUp">
							  <div id="myStat2" data-dimension="150" data-text="<?php echo $singlepro_options['circular_skill_counter3_percentage']?>%" data-info="" data-width="10" data-fontsize="25" data-percent="<?php echo $singlepro_options['circular_skill_counter3_percentage']?>" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
							  <h4><?php echo $singlepro_options['circular_skill_counter3_deptName']?></h4>
							</div>
						  </div>	
						  
					<?php } ?> 						
					
                  <!-- START SINGLE SKILL-->				
					
					<?php 
						//global $singlepro_options;
						if(!empty($singlepro_options['circular_skill_counter4_percentage'])) { ?>
						
						  <div class="col-lg-3 col-md-3 col-sm-3">                 
							<div class="single_skill wow fadeInUp">
							  <div id="myStat3" data-dimension="150" data-text="<?php echo $singlepro_options['circular_skill_counter4_percentage']?>%" data-info="" data-width="10" data-fontsize="25" data-percent="<?php echo $singlepro_options['circular_skill_counter4_percentage']?>" data-fgcolor="#999" data-bgcolor="#fff"  data-icon="fa-task"></div>
							  <h4><?php echo $singlepro_options['circular_skill_counter4_deptName']?></h4>
							</div>
						  </div>	
						  
					<?php } ?> 					
					
				  
				  
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END SKILLS  -->