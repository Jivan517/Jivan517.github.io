	<div class="col-lg-6 col-md-6 col-sm-6">
	  <div id="post-<?php the_ID(); ?>" <?php post_class('single_post wow fadeInUp'); ?>>
	  
		<?php if(has_post_thumbnail()) {?>
		<div class="blog_img">
		  <?php the_post_thumbnail('about-slide-images', array('alt' => get_the_title())); ?>
		</div>
		<?php }?>
		
		<h3><?php the_title();?></h3>
		<?php get_template_part('post-meta');?>
		<p><?php the_excerpt(); ?></p>
		<a href="<?php the_permalink(); ?>" class="read_more"><?php _e('Read More','singlepro');?> <i class="fa fa-angle-double-right">  </i></a>
	  </div>
	</div>