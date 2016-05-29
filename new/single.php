	<?php 
	
	/*************
	 *
	 * @package  		 SinglePro
	 * @file     		 single.php
	 * @author   		 WpFreeware Team
	 * @Author Link 	 http://wpfreeware.com
	 * @license	 		 GPL v3 or later
	 * @license url: 	 http://www.gnu.org/licenses/gpl-3.0.html
	 ***************/		
	
	get_header();
	
	?>

 
		
    <!--=========== BEGIN BLOG BANNER SECTION ================-->
	<?php get_template_part('inc/templates/blog-banner');?>
    <!--=========== END BLOG BANNER SECTION ================-->
	
				

    <!--=========== BEGAIN BLOG SECTION ================-->
    <section id="blog" class="blog_archive">
      <div class="container">
        <div class="row">        
		
          <div class="col-lg-8 col-md-8 col-sm-12">
		  
            <!-- BEGAIN BLOG CONTENT -->
            <div class="blogdetails_content">
			
				<?php if(have_posts()) : ?><?php while(have_posts())  : the_post(); ?>

				 <h2><?php the_title();?></h2>
				 <?php get_template_part('post-meta');?>
				
				<?php the_content();?>
				
				
			  <?php 
			  
				wp_link_pages( array(
					'before'      => '<div class="singlepost-pagination"><span>'. __( 'Pages:', 'wpf-flaty' ) .'</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
				) );								  
			  
			  ?>				
					

				<div class="post-tags">
				  <?php the_tags( __('<i class="fa fa-tags"></i> Tags: ', 'singlepro'), ', ', '<br />' ); ?>
				</div> 				
				
            </div>
			
            <!-- Start single blog navigation -->
            <div class="post_navigation">

				<?php previous_post_link('%link', '<i class="fa fa-hand-o-left"></i> '.__('Previous','singlepro').' ', TRUE); ?> 
				<?php next_post_link( '%link', ''.__('Next','singlepro').' <i class="fa fa-hand-o-right"></i>', TRUE ); ?>
						

            </div>
            <!-- End single blog navigation -->
			
			
				<!-- Start similar post -->
				<?php get_template_part('inc/templates/related-posts');?>
				<!-- End similar post --> 
				
			  <?php 
				
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;	
					
			  ?>  				
					
				<?php endwhile; ?>

				<?php else : ?>
					<h3 style="text-align:center;margin:100px auto;font-weight:bold;font-size:30px;line-height:35px;"><?php _e('Sorry! Nothing Found', 'wpf'); ?></h3>
				<?php endif; ?>				
						

		  
          </div>
		  
		  <?php get_sidebar();?>
		  
        </div>
      </div>
    </section>
    <!--=========== END BLOG SECTION ================-->

	<?php get_footer();?>

	