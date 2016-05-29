	<?php 
	
	/*************
	 *
	 * @package  		 SinglePro
	 * @file     		 404.php
	 * @author   		 WpFreeware Team
	 * @Author Link 	 http://wpfreeware.com
	 * @license	 		 GPL v3 or later
	 * @license url: 	 http://www.gnu.org/licenses/gpl-3.0.html
	 ***************/		
	
	get_header();
	
	?>

	
				

    <!--=========== BEGAIN BLOG SECTION ================-->
    <section id="blog" class="blog_archive">
      <div class="container">
        <div class="row">        
		
          <div class="col-lg-8 col-md-8 col-sm-12">
		  
            <!-- BEGAIN BLOG CONTENT -->
            <div class="blogdetails_content">
			

				<h1 style="margin:150px 0;text-align:center;" ><?php _e('404 <br/> Sorry! Nothing found.','singlepro')?></h1>
				<a style="font-weight:bold;" href="<?php echo home_url();?>"><i class="fa fa-hand-o-left"></i> Go Home</a>
				

				
            </div>			
			
			 
						

		  
          </div>
		  
		  <?php get_sidebar();?>
		  
        </div>
      </div>
    </section>
    <!--=========== END BLOG SECTION ================-->

	<?php get_footer();?>

	