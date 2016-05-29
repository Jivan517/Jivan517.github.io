	<?php 
		global $singlepro_options;
		if(!empty($singlepro_options['disable_blog_banner'])) { ?>   

		<section id="blogBanner">
		  <div class="container">
			<div class="row">
			<div class="col-lg-12 col-md-12">
			  
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['blog_section_banner_title'])) { ?>
						<h2><?php echo $singlepro_options['blog_section_banner_title']?></h2>
				<?php } ?> 
				
			</div>
		  </div>
		  </div>
		</section>
	
	<?php } ?> 