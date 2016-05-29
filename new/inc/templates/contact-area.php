	<?php 
		global $singlepro_options;
		if(!empty($singlepro_options['contact_area'])) { ?>


    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- START CONTACT HEADING -->
            <div class="heading">

				<!-- Title -->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['contact_area_title'])) { ?>
						<h2 class="wow fadeInLeftBig"><?php echo $singlepro_options['contact_area_title']?></h2>
				<?php } ?> 		

				<!-- Description -->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['contact_area_desc'])) { ?>
						<p><?php echo $singlepro_options['contact_area_desc']?></p>
				<?php } ?> 					
			  
            </div>
          </div>
        </div>  
		
        <div class="row">
          <!-- BEGAIN CONTACT CONTENT -->
          <div class="contact_content">
            <!-- BEGAIN CONTACT FORM -->
            <div class="col-lg-5 col-md-5 col-sm-5">
              <div class="contact_form">
			  
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['contact_form_shortcode'])) { ?>
						<?php echo do_shortcode(''.$singlepro_options['contact_form_shortcode'].'');?>
				<?php } ?> 					
	
              </div>
            </div>
			
            <!-- BEGAIN CONTACT MAP -->
            <div class="col-lg-7 col-md-7 col-sm-7">
              
              
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['google_map_code'])) { ?>
					<div class="contact_map">
						<!-- BEGAIN GOOGLE MAP -->
						<?php echo $singlepro_options['google_map_code']?>
					</div>
				<?php } ?> 				
				
              
            </div>           
          </div>
        </div>      
      </div>             
    </section>		
		
		
	<?php } ?> 	
