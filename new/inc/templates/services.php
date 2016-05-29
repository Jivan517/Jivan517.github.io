    <?php 
		global $singlepro_options;
		if(!empty($singlepro_options['services_items'])) { ?>

		
    <section id="service">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- BEGAIN SERVICE HEADING -->
            <div class="heading">
			
				<!-- title -->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['services_title'])) { ?>
						<h2 class="wow fadeInLeftBig"><?php echo $singlepro_options['services_title']?></h2>
				<?php } ?> 	 				
				
				<!--description-->
				
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['services_desc'])) { ?>
						<p><?php echo $singlepro_options['services_desc']?></p>
				<?php } ?> 	 				

				
            </div>
          </div>          
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- BEGAIN SERVICE  -->
            <div class="service_area">
              <div class="row">
			  
			  
				<?php if(!is_paged()) { ?>
				<?php
					$args = array( 'post_type' => 'services', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
				?>  
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


					<div class="col-lg-6 col-md-6 col-sm-6">
					  <!-- BEGAIN SINGLE SERVICE -->
					  <div class="single_service wow <?php $service_animation="service_item_animation"; echo get_post_meta($post->ID, $service_animation, true); ?>">
						<div class="service_iconarea">
						  <span class="fa <?php $service_icon = get_post_meta( $post->ID, 'service_item_icon', true ); if ( $service_icon ) { echo $service_icon; } else { echo 'fa-envelope-o'; } ?> service_icon"></span>
						</div>
						<h3 class="service_title"><?php the_title();?></h3>
						<p><?php the_content();?></p>
					  </div>
					</div>					


				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
				<?php } ?>					
			  

				
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>		
		
		
    <?php } ?>  