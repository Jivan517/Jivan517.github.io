					<div class="col-lg-3 col-md-3 col-sm-4">
					  <div class="single_team wow fadeInUp">
						<div class="team_img">
						  <?php the_post_thumbnail('team-slide-images', array('alt' => get_the_title())); ?>
						</div>
						<h5 class=""><?php the_title();?></h5>
						<?php $member_position = get_post_meta($post->ID, 'member_position', true); if($member_position) : ?> <span><?php echo $member_position; ?></span>  <?php endif; ?>
						<?php $member_bio = get_post_meta($post->ID, 'member_bio', true); if($member_bio) : ?> <p><?php echo $member_bio; ?></p>  <?php endif; ?>
						
						<div class="team_social">
						  
							<!-- Social icon 1-->
							<?php $social_link_1 = get_post_meta($post->ID, 'social_link_1', true);
							if($social_link_1) : ?>
								<a href="<?php echo $social_link_1; ?>" target="_blank"><i class="fa <?php $social_icon_1="social_icon_1"; echo get_post_meta($post->ID, $social_icon_1, true); ?>"></i></a>
							<?php endif; ?>		

							<!-- Social icon 2-->
							<?php $social_link_2 = get_post_meta($post->ID, 'social_link_2', true);
							if($social_link_2) : ?>
								<a href="<?php echo $social_link_2; ?>" target="_blank"><i class="fa <?php $social_icon_2="social_icon_2"; echo get_post_meta($post->ID, $social_icon_2, true); ?>"></i></a>
							<?php endif; ?>	

							<!-- Social icon 3-->
							<?php $social_link_3 = get_post_meta($post->ID, 'social_link_3', true);
							if($social_link_3) : ?>
								<a href="<?php echo $social_link_3; ?>" target="_blank"><i class="fa <?php $social_icon_3="social_icon_3"; echo get_post_meta($post->ID, $social_icon_3, true); ?>"></i></a>
							<?php endif; ?>	

							<!-- Social icon 4-->
							<?php $social_link_4 = get_post_meta($post->ID, 'social_link_4', true);
							if($social_link_4) : ?>
								<a href="<?php echo $social_link_4; ?>" target="_blank"><i class="fa <?php $social_icon_4="social_icon_4"; echo get_post_meta($post->ID, $social_icon_4, true); ?>"></i></a>
							<?php endif; ?>								
						  

						</div>
					  </div>
					</div>	