          <div class="col-lg-4 col-md-4 col-sm-12">
            <!-- Start blog sidebar -->
            <div class="blog_sidebar">			
			
				  <!-- Start single sidebar -->
				<?php if(! dynamic_sidebar('post_sidebar')) :?>
					<a href="<?php bloginfo('url');?>/wp-admin/widgets.php"><?php _e('Click here to add widgets', 'singlepro'); ?></a>
				<?php endif; ?>				  
			  
			  
            </div>
            <!-- End blog sidebar -->
          </div>