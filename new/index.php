	<?php 
	
	/*************
	 *
	 * @package  		 SinglePro
	 * @file     		 index.php
	 * @author   		 WpFreeware
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
            <div class="blogarchive_content">        
                <!-- BEGAIN SINGLE BLOG -->
				
				<?php if(have_posts()) : ?><?php while(have_posts())  : the_post(); ?>

					<?php get_template_part('post-excerpt');?>
					
				<?php endwhile; ?>

				<?php else : ?>
					<h3 style="text-align:center;margin:100px auto;font-weight:bold;font-size:30px;line-height:35px;"><?php _e('Sorry! Nothing Found', 'singlepro'); ?></h3>
				<?php endif; ?>					
				
              
           
            </div>
			
			
            <!-- start pagination -->
			<?php echo blog_pagination();?>
            <!-- End pagination -->				

		  
          </div>
		  
		  <?php get_sidebar();?>
		  
        </div>
      </div>
    </section>
    <!--=========== END BLOG SECTION ================-->

	<?php get_footer();?>

	