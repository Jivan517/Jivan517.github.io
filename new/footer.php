     <!--=========== BEGAIN FOOTER ================-->
     <footer id="footer">
	 
       <div class="container">
         <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="footer_left">
				<!--=========== Designed By WpFreeware Team ================-->			   
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['footer_copyright_text'])) { ?>
						<p><?php echo $singlepro_options['footer_copyright_text']?></p>
				<?php } ?> 				   
			   <!--=========== Designed By WpFreeware Team ================-->
             </div>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
				<?php get_template_part('inc/templates/footer-social');?>
           </div>
         </div>
       </div>
	   
	   
	   <?php //get_template_part('inc/templates/credits');?>
	   
      </footer>
      <!--=========== END FOOTER ================-->

	<?php wp_footer();?>
  </body>
</html>