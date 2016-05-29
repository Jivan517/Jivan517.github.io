	<?php 
		global $singlepro_options;
		if(!empty($singlepro_options['testimonial_area'])) { ?>

    <section id="testimonial">
      <div class="container"> 
        <div class="row">
          <div class=" col-lg-7 col-md-7 col-sm-6">
            <!-- START BLOG HEADING -->
            <div class="heading">
			
				<!-- title -->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['testimonial_big_title'])) { ?>
						<h2 class="wow fadeInLeftBig"><?php echo $singlepro_options['testimonial_big_title']?></h2>
				<?php } ?> 		
				
				<!-- Description -->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['testimonial_section_desc'])) { ?>
						<p><?php echo $singlepro_options['testimonial_section_desc']?></p>
				<?php } ?> 					
			
			
            </div>
          </div>
          <div class=" col-lg-5 col-md-5 col-sm-6">
            <div class="testimonial_customer">
              <!-- BEGAIN TESTIMONIAL SLIDER -->
			 
              <ul class="testimonial_slider">
			  
				<?php if(!is_paged()) { ?>
				<?php
					$args = array( 'post_type' => 'testimonials', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
				?>  
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
					<li>
					  <div class="media testi_media">
						<a class="media-left testi_img">
						  <?php the_post_thumbnail('team-slide-images', array('alt' => get_the_title())); ?>
						</a>
						<div class="media-body">
						  <h4 class="media-heading"><?php the_title();?></h4>                   
						  <?php $testimonials_client_position = get_post_meta($post->ID, 'testimonials_client_position', true); if($testimonials_client_position) : ?> <span><?php echo $testimonials_client_position; ?></span> <?php endif; ?>                      
						</div>
					  </div>
					  <div class="testi_content">
						<p><?php the_content();?></p>
					  </div>
					</li>					
										


				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
				<?php } ?>					
		  
			  
            </div>
          </div>           
        </div>
      </div>
    </section>
	
	
<?php } ?> 	