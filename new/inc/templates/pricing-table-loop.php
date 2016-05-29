				  <div class="col-lg-3 col-md-3 col-sm-3">
					<div class="single_price wow fadeInUp <?php $pricing_table_featured = get_post_meta($post->ID, 'pricing_table_featured', true); if($pricing_table_featured) : ?> <?php echo 'business_price'; ?> <?php endif; ?>">
					  <h3><?php the_title();?></h3>
					  <div class="price">
					  
						<!--price-->
						<?php $table_price = get_post_meta($post->ID, 'table_price', true);
						if($table_price) : ?>
						<h4><?php echo $table_price; ?></h4>
						<?php endif; ?>
						
						<!--Per Item or month-->
						<?php $table_price_permonth = get_post_meta($post->ID, 'table_price_permonth', true);
						if($table_price_permonth) : ?>
						<span><?php echo $table_price_permonth; ?></span>
						<?php endif; ?>						
						
					  </div>
					  
					  <ul class="price_features">
						 
						<!--Field 1-->
						<?php $table_price_field1 = get_post_meta($post->ID, 'table_price_field1', true);
						if($table_price_field1) : ?>
						<li><?php echo $table_price_field1; ?></li>
						<?php endif; ?>	
						
						<!--Field 2-->
						<?php $table_price_field2 = get_post_meta($post->ID, 'table_price_field2', true);
						if($table_price_field2) : ?>
						<li><?php echo $table_price_field2; ?></li>
						<?php endif; ?>	

						<!--Field 3-->
						<?php $table_price_field3 = get_post_meta($post->ID, 'table_price_field3', true);
						if($table_price_field3) : ?>
						<li><?php echo $table_price_field3; ?></li>
						<?php endif; ?>	

						<!--Field 4-->
						<?php $table_price_field4 = get_post_meta($post->ID, 'table_price_field4', true);
						if($table_price_field4) : ?>
						<li><?php echo $table_price_field4; ?></li>
						<?php endif; ?>						

						<!--Field 5-->
						<?php $table_price_field5 = get_post_meta($post->ID, 'table_price_field5', true);
						if($table_price_field5) : ?>
						<li><?php echo $table_price_field5; ?></li>
						<?php endif; ?>	
						
						<!--Field 6-->
						<?php $table_price_field6 = get_post_meta($post->ID, 'table_price_field6', true);
						if($table_price_field6) : ?>
						<li><?php echo $table_price_field6; ?></li>
						<?php endif; ?>							
						
						<!--Field 7-->
						<?php $table_price_field7 = get_post_meta($post->ID, 'table_price_field7', true);
						if($table_price_field7) : ?>
						<li><?php echo $table_price_field7; ?></li>
						<?php endif; ?>	

						<!--Field 8-->
						<?php $table_price_field8 = get_post_meta($post->ID, 'table_price_field8', true);
						if($table_price_field8) : ?>
						<li><?php echo $table_price_field8; ?></li>
						<?php endif; ?>	
						
						<!--Field 9-->
						<?php $table_price_field9 = get_post_meta($post->ID, 'table_price_field9', true);
						if($table_price_field9) : ?>
						<li><?php echo $table_price_field9; ?></li>
						<?php endif; ?>		

						<!--Field 10-->
						<?php $table_price_field10 = get_post_meta($post->ID, 'table_price_field10', true);
						if($table_price_field10) : ?>
						<li><?php echo $table_price_field10; ?></li>
						<?php endif; ?>							
						
					  </ul>
					  
						<!--Pricing table button-->
						<?php $table_price_btn_url = get_post_meta($post->ID, 'table_price_btn_url', true);
						if($table_price_btn_url) : ?>
						<a href="<?php echo $table_price_btn_url; ?>" class="price_btn"><?php $table_price_btn_text="table_price_btn_text"; echo get_post_meta($post->ID, $table_price_btn_text, true); ?></a>
						<?php endif; ?>	
						
					</div>
				  </div>