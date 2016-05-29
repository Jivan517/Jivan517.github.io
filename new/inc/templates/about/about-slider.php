                      <div class="featured_slider">
					  
						<?php
						
							global $singlepro_options;
							if(!empty($singlepro_options['about_us_gallery'])) { 
						
							  $images = explode( ',', $singlepro_options['about_us_gallery'] );
							  if ( ! empty( $images ) ) {
								foreach( $images as $id ) {
								  if ( ! empty( $id ) ) {
									$about_gallery_img_src = wp_get_attachment_image_src( $id, 'about-slide-images' );
									
									echo '

										<div class="single_iteam">
										   <img src="'.$about_gallery_img_src[0].'">                         
										</div>									
									
									';
								  }
								}
							  }
						  
						  }
						  
						?>							
					  

                      </div>