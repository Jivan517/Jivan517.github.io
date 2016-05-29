	<?php 
		global $singlepro_options;
		if(!empty($singlepro_options['contact_info_area'])) { ?>
			
			
    <section id="contactFeature">
      <!-- SKILLS COUNTER OVERLAY -->
      <div class="slider_overlay"></div>
      <div class="row">
        <div class="col-lg-12 col-md-12">       
          <div class="container">               
              <div class="contact_feature">
            <!-- BEGAIN CALL US FEATURE -->			
			<?php 
				global $singlepro_options;
				if(!empty($singlepro_options['contact_info_title1'])) { ?>
					
					<div class="col-lg-3 col-md-3 col-sm-6">
					  <div class="single_contact_feaured wow fadeInUp">
						<i class="fa <?php echo $singlepro_options['contact_info_icon1']?>"></i>
						<h4><?php echo $singlepro_options['contact_info_title1']?></h4>
						<p><?php echo $singlepro_options['contact_info_1']?></p>                
					  </div>
					</div>
			
			<?php } ?> 			
			
            <!-- BEGAIN CALL US FEATURE -->
			<?php 
				global $singlepro_options;
				if(!empty($singlepro_options['contact_info_title2'])) { ?>
					
					<div class="col-lg-3 col-md-3 col-sm-6">
					  <div class="single_contact_feaured wow fadeInUp">
						<i class="fa <?php echo $singlepro_options['contact_info_icon2']?>"></i>
						<h4><?php echo $singlepro_options['contact_info_title2']?></h4>
						<p><?php echo $singlepro_options['contact_info_2']?></p>                
					  </div>
					</div>
			
			<?php } ?> 
			
            <!-- BEGAIN CALL US FEATURE -->
			<?php 
				global $singlepro_options;
				if(!empty($singlepro_options['contact_info_title3'])) { ?>
					
					<div class="col-lg-3 col-md-3 col-sm-6">
					  <div class="single_contact_feaured wow fadeInUp">
						<i class="fa <?php echo $singlepro_options['contact_info_icon3']?>"></i>
						<h4><?php echo $singlepro_options['contact_info_title3']?></h4>
						<p><?php echo $singlepro_options['contact_info_3']?></p>                
					  </div>
					</div>
			
			<?php } ?> 
			
            <!-- BEGAIN CALL US FEATURE -->
			<?php 
				global $singlepro_options;
				if(!empty($singlepro_options['contact_info_title4'])) { ?>
					
					<div class="col-lg-3 col-md-3 col-sm-6">
					  <div class="single_contact_feaured wow fadeInUp">
						<i class="fa <?php echo $singlepro_options['contact_info_icon4']?>"></i>
						<h4><?php echo $singlepro_options['contact_info_title4']?></h4>
						<p><?php echo $singlepro_options['contact_info_4']?></p>                
					  </div>
					</div>
			
			<?php } ?> 
			
          </div>
          </div>         
        </div>
      </div>
    </section>			
			
			
	<?php } ?> 