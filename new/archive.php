	<?php 
	
	/*************
	 *
	 * @package  		 SinglePro
	 * @file     		 archive.php
	 * @author   		 WpFreeware Team
	 * @Author Link 	 http://wpfreeware.com
	 * @license	 		 GPL v3 or later
	 * @license url: 	 http://www.gnu.org/licenses/gpl-3.0.html
	 ***************/		
	
	get_header();
	
	?>

 
		
    <!--=========== BEGIN BLOG BANNER SECTION ================-->
		<section id="blogBanner">
		  <div class="container">
			<div class="row">
			<div class="col-lg-12 col-md-12">

				<h2>
				<?php if (have_posts()) : ?>
						<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
							<?php /* If this is a category archive */ if (is_category()) { ?>
							<?php echo single_cat_title(); ?> <?php _e('Archive', 'singlepro'); ?>
							<?php /* If this is a tag archive */  } elseif( is_tag() ) { ?>
							<?php single_tag_title(); ?> <?php _e('Archive', 'singlepro'); ?>
							<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
							<?php the_time('F jS, Y'); ?> <?php _e('Archive', 'singlepro'); ?>						
							<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
							<?php the_time('F, Y'); ?> <?php _e('Archive', 'singlepro'); ?>					
							<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
							<?php the_time('Y'); ?> <?php _e('Archive', 'singlepro'); ?>
							<?php /* If this is a search */ } elseif (is_search()) { ?>
								<?php _e('Search Results', 'singlepro'); ?>
							<?php /* If this is an author archive */ } elseif (is_author()) { ?>
								<?php _e('Author Archive', 'singlepro'); ?>
							<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
								<?php _e('Blog Archives', 'singlepro'); ?>
					<?php } ?>				
				</h2>
				
			</div>
		  </div>
		  </div>
		</section>
    <!--=========== END BLOG BANNER SECTION ================-->
	
				

    <!--=========== BEGAIN BLOG SECTION ================-->
    <section id="blog" class="blog_archive">
      <div class="container">
        <div class="row">        
		
          <div class="col-lg-8 col-md-8 col-sm-12">
            <!-- BEGAIN BLOG CONTENT -->
            <div class="blogarchive_content">        
                <!-- BEGAIN SINGLE BLOG -->
				
				<?php while(have_posts())  : the_post(); ?>

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

	