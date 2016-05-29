     <!-- BEGAIN PRELOADER -->
	
	<?php 
		global $singlepro_options;
		if(!empty($singlepro_options['pre_loader'])) { ?>
			
			<div id="preloader">
			  <div id="status">&nbsp;</div>
			</div>
	
	<?php } ?> 	
	
    <!-- END PRELOADER -->

    <!-- SCROLL TOP BUTTON -->
	
	<?php 
		//global $singlepro_options;
		if(!empty($singlepro_options['scroll_top'])) { ?>
			
			<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
	
	<?php } ?> 	
	
    <!-- END SCROLL TOP BUTTON -->