   <?php global $singlepro_options;if(!empty($singlepro_options['logo_uploader']['url'])) { ?>
   
			<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" ><img src="<?php echo $singlepro_options['logo_uploader']['url'];?>" alt="<?php bloginfo('name');?>"></a>				
	
	<?php } else { ?>
			<a class="navbar-brand" href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" ><?php bloginfo('name'); ?></a>
	<?php } ?>	