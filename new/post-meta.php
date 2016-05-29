				<div class="post_commentbox">
				  <span><i class="fa fa-user"></i> <?php the_author(); ?></span>
				  <span><i class="fa fa-calendar"></i> <?php the_time('M d, Y') ?></span>
				  <span><i class="fa fa-tags"></i> <?php the_category(', '); ?></span>
				  <?php edit_post_link( __(' Edit','markups'), '<span class="fa fa-pencil"></span>', ''); ?></span>
				</div>