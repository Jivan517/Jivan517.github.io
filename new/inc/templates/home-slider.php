	  
	  <section id="home_fullscreen_slider">
	  
	  <!-- BEGIN SLIDER AREA-->
      <div class="slider_area">
        <!-- BEGIN SLIDER-->          
        <div id="slides">
          <ul class="slides-container">
		  
		  
			<?php if(!is_paged()) { ?>
			<?php
				$args = array( 'post_type' => 'slider', 'posts_per_page' => -1 );
				$loop = new WP_Query( $args );
			?>  
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


				<li>
				  <!-- FIRST SLIDE OVERLAY -->
				  <div class="slider_overlay"></div> 
				  <!-- FIRST SLIDE MAIN IMAGE -->
				  <?php the_post_thumbnail('slide-images', array('alt' => get_the_title())); ?>
				  <!-- FIRST SLIDE CAPTION-->
				  <div class="slider_caption">
					<h2><?php the_title();?></h2>
					<p><?php $slide_desc="slide_desc"; echo get_post_meta($post->ID, $slide_desc, true); ?></p>
					<a href="<?php $slide_link="slide_link"; echo get_post_meta($post->ID, $slide_link, true); ?>" class="slider_btn" target="<?php $slide_target_link="slide_target_link"; echo get_post_meta($post->ID, $slide_target_link, true); ?>"><?php $slide_link_text="slide_link_text"; echo get_post_meta($post->ID, $slide_link_text, true); ?></a>
				  </div>
				</li>			


			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
			<?php } ?>				
			
          </ul>
          <!-- BEGAIN SLIDER NAVIGATION -->
          <nav class="slides-navigation">
            <!-- PREV IN THE SLIDE -->
            <a class="prev" href="/item1">
              <span class="icon-wrap"></span>
              <h3><strong><?php _e('Prev','singlepro');?></strong></h3>
            </a>
            <!-- NEXT IN THE SLIDE -->
            <a class="next" href="/item3">
              <span class="icon-wrap"></span>
              <h3><strong><?php _e('Next','singlepro');?></strong></h3>
            </a>
          </nav>       
        </div>
        <!-- END SLIDER-->          
      </div>
      <!-- END SLIDER AREA -->	  
	  
	  
	  </section>