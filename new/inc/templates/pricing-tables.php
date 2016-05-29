	<?php 
		global $singlepro_options;
		if(!empty($singlepro_options['pricing_area'])) { ?>
			
			
   <section id="pricing">
      <div class="container">
        <div class="row col-lg-12 col-md-12">
          <!-- START ABOUT HEADING -->
          <div class="heading">
            
			<!-- title -->
			<?php 
				global $singlepro_options;
				if(!empty($singlepro_options['pricing_table_big_title'])) { ?>
					<h2 class="wow fadeInLeftBig"><?php echo $singlepro_options['pricing_table_big_title']?></h2>
			<?php } ?> 		
			
			<!-- Description -->
			<?php 
				global $singlepro_options;
				if(!empty($singlepro_options['pricing_table_desc'])) { ?>
					<p><?php echo $singlepro_options['pricing_table_desc']?></p>
			<?php } ?> 				
			
          </div>
        </div>
        <div class="row col-lg-12 col-md-12">
          <div class="pricing_area">
            <div class="row">
              <!-- BEGAIN BASIC PRICE TABLE -->
			  
				<?php if(!is_paged()) { ?>
				<?php
					$args = array( 'post_type' => 'pricing-tables', 'posts_per_page' => 4 );
					$loop = new WP_Query( $args );
				?>  
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


					<?php get_template_part('inc/templates/pricing-table-loop');?>
										


				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
				<?php } ?>				  
			  
			  
            </div>
          </div>
        </div>
      </div>
    </section>			
			
			
	<?php } ?> 	   