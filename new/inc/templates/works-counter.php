      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="counter_section">
            <!-- SKILLS COUNTER OVERLAY -->
            <div class="slider_overlay"></div>
            <div class="container">               
              <div class="counter_area">
               <div class="heading">
   
					<?php 
						global $singlepro_options;
						if(!empty($singlepro_options['works_skill_counter_title'])) { ?>
							<h3 class="wow fadeInLeft"><?php echo $singlepro_options['works_skill_counter_title']?></h3> 
					<?php } ?> 					
				  
                </div>
				
                <!-- START SINGLE COUNTER-->	
				
				<?php 
					//global $singlepro_options;
					if(!empty($singlepro_options['works_skill_counter1_amount'])) { ?>
						
					<div class="col-lg-3 col-md-3 col-sm-3">
					  <div class="counter wow fadeInUp">
						<i class="fa <?php echo $singlepro_options['works_skill_counter1_icon']?> fa-2x"></i>
						<h2 class="timer count-title" id="count-number" data-to="<?php echo $singlepro_options['works_skill_counter1_amount']?>" data-speed="1500"><?php echo $singlepro_options['works_skill_counter1_amount']?></h2>
						 <p class="count-text "><?php echo $singlepro_options['works_skill_counter1_deptName']?></p>
					  </div>
					</div>						
						
				<?php } ?> 				
				
				
                <!-- START SINGLE COUNTER-->				
				<?php 
					//global $singlepro_options;
					if(!empty($singlepro_options['works_skill_counter2_amount'])) { ?>
						
					<div class="col-lg-3 col-md-3 col-sm-3">
					  <div class="counter wow fadeInUp">
						<i class="fa <?php echo $singlepro_options['works_skill_counter2_icon']?> fa-2x"></i>
						<h2 class="timer count-title" id="count-number2" data-to="<?php echo $singlepro_options['works_skill_counter2_amount']?>" data-speed="1500"><?php echo $singlepro_options['works_skill_counter2_amount']?></h2>
						 <p class="count-text "><?php echo $singlepro_options['works_skill_counter2_deptName']?></p>
					  </div>
					</div>					
						
				<?php } ?> 					
				
                <!-- START SINGLE COUNTER-->
				
				<?php 
					//global $singlepro_options;
					if(!empty($singlepro_options['works_skill_counter3_amount'])) { ?>
					<div class="col-lg-3 col-md-3 col-sm-3">                 
					   <div class="counter wow fadeInUp">
						<i class="fa <?php echo $singlepro_options['works_skill_counter3_icon']?> fa-2x"></i>
						<h2 class="timer count-title" id="count-number3" data-to="<?php echo $singlepro_options['works_skill_counter3_amount']?>" data-speed="1500"><?php echo $singlepro_options['works_skill_counter3_amount']?></h2>
						 <p class="count-text "><?php echo $singlepro_options['works_skill_counter3_deptName']?></p>
					  </div>
					</div>					
						
				<?php } ?> 
				
                <!-- START SINGLE COUNTER-->
				
				<?php 
					//global $singlepro_options;
					if(!empty($singlepro_options['works_skill_counter4_amount'])) { ?>					
					<div class="col-lg-3 col-md-3 col-sm-3">                 
					  <div class="counter wow fadeInUp">
						<i class="fa <?php echo $singlepro_options['works_skill_counter4_icon']?> fa-2x"></i>
						<h2 class="timer count-title" id="count-number4" data-to="<?php echo $singlepro_options['works_skill_counter4_amount']?>" data-speed="1500"><?php echo $singlepro_options['works_skill_counter4_amount']?></h2>
						 <p class="count-text "><?php echo $singlepro_options['works_skill_counter4_deptName']?></p>
					  </div>
					</div>						
						
				<?php } ?> 				
				
              </div>
            </div>
          </div>
        </div>
      </div>