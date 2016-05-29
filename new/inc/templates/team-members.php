	<?php 
		global $singlepro_options;
		if(!empty($singlepro_options['team_area'])) { ?>

   <section id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- BEGAIN ABOUT HEADING -->
            <div class="heading">
              
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['team_members_title'])) { ?>
						<h2 class="wow fadeInLeftBig"><?php echo $singlepro_options['team_members_title']?></h2>   
				<?php } ?>
 				
            </div>
			
            <div class="team_area">
              <!-- BEGAIN TEAM SLIDER -->
              <div class="team_slider">  
                <!-- BEGAIN SINGLE TEAM SLIDE#1 -->  

				<?php if(!is_paged()) { ?>
				<?php
					$args = array( 'post_type' => 'teammember', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
				?>  
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


					<?php get_template_part('inc/templates/team-members-loop');?>


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