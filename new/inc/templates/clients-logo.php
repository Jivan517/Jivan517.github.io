	<?php 
		global $singlepro_options;
		if(!empty($singlepro_options['clients_logo_area'])) { ?>
			
			
    <section id="clients">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- START BLOG HEADING -->
            <div class="heading">
			  
				<!-- title -->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['clients_big_title'])) { ?>
						<h2 class="wow fadeInLeftBig"><?php echo $singlepro_options['clients_big_title']?></h2>
				<?php } ?> 	

				<!-- Description -->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['clients_area_desc'])) { ?>
						<p><?php echo $singlepro_options['clients_area_desc']?></p>
				<?php } ?> 				
			  
            </div>
          </div>
		  
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="clients_content">
              <div class="row">
                <!-- BEGAIN CLIENTS SLIDER -->
                <div class="clients_slider">
                  <!-- BEGAIN SINGLE CLIENT SLIDE#1 -->
				  
						<?php
						
							global $singlepro_options;
							if(!empty($singlepro_options['clients_logo_gallery'])) { 
						
							  $images = explode( ',', $singlepro_options['clients_logo_gallery'] );
							  if ( ! empty( $images ) ) {
								foreach( $images as $id ) {
								  if ( ! empty( $id ) ) {
									$clients_gallery_img_src = wp_get_attachment_image_src( $id, 'clients-slide-images' );
									
									echo '

									  <div class="col-lg-3 col-md-3 col-sm-3">
										<div class="single_client">
										  <img src="'.$clients_gallery_img_src[0].'" alt="clients logo">
										</div>
									  </div>										
									
									';
								  }
								}
							  }
						  
						  }
						  
						?>	
				  
				  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>			
			
			
	<?php } ?> 	
