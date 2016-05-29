	<?php 
		global $singlepro_options;
		if(!empty($singlepro_options['from_blog_area'])) { ?>


    <!--=========== BEGAIN BLOG SECTION ================-->
    <section id="blog">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- START BLOG HEADING -->
            <div class="heading">
			
				<!-- title -->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['from_blog_big_title'])) { ?>
						<h2 class="wow fadeInLeftBig"><?php echo $singlepro_options['from_blog_big_title']?></h2>
				<?php } ?> 		
				
				<!-- Description -->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['from_blog_desc'])) { ?>
						<p><?php echo $singlepro_options['from_blog_desc']?></p>
				<?php } ?> 				
			
            </div>
          </div>
          <div class="col-lg-12 col-md-12">
            <!-- BEGAIN BLOG CONTENT -->
            <div class="blog_content">
			  
			  
              <!-- BEGAIN BLOG SLIDER -->
              <div class="blog_slider">
                <!-- BEGAIN SINGLE BLOG -->
				
				
				<?php if(!is_paged()) { ?>
				<?php
					$args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
				?>  
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>	

					<div class="col-lg-4 col-md-4 col-sm-4">
					  <div class="single_post wow fadeInUp">
						<div class="blog_img">
						  <?php the_post_thumbnail('blog-thmub-img', array('alt' => get_the_title())); ?>
						</div>
						<h3><?php the_title();?></h3>
						<div class="post_commentbox">
						  <span><i class="fa fa-user"></i> <?php the_author(); ?></span>
						  <span><i class="fa fa-calendar"></i> <?php the_time('M d, Y') ?></span>
						  <span><i class="fa fa-tags"></i> <?php the_category(', '); ?></span>
						</div>
						<p><?php the_excerpt(); ?></p>
						<a href="<?php the_permalink(); ?>" class="read_more">Read More <i class="fa fa-angle-double-right">  </i></a>
					  </div>
					</div>					
										


				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
				<?php } ?>					
				
				
              </div>

				<!--blog archive link-->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['blog_archive_lint'])) { ?>
						<p class="post_archive_link"><a href="<?php echo $singlepro_options['blog_archive_lint']?>" style="">View All</a></p>
				<?php } ?> 					
			  
			  
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END BLOG SECTION ================-->
	
	
<?php } ?> 		