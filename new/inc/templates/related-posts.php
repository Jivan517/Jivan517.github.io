    <?php $orig_post = $post;
    global $post;
    $categories = get_the_category($post->ID);
    if ($categories) {
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

    $args=array(
    'category__in' => $category_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=> 4, // Number of related posts that will be shown.
    'ignore_sticky_posts'=> 1
    );

    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) {
    echo '<div class="similar_post">
              <h2>'.__('You may also like','singlepro').'</h2>
             <ul class="popular_tab">';
    while( $my_query->have_posts() ) {
    $my_query->the_post();?>

	<li>
	  <div class="media">
		<div class="media-left">
		  <a href="#" class="news_img">
			<?php the_post_thumbnail('about-slide-images', array('alt' => get_the_title(),'class' => 'media-object')); ?>
		  </a>
		</div>
		<div class="media-body">
		 <a href="<?php the_permalink();?>"><?php the_title();?></a>
		 <span class="feed_date"><?php the_time('M d, Y') ?></span>
		</div>
	  </div>
	</li>	  
	
    <?php
    }
    echo '</ul></div>';
    }
    }
    $post = $orig_post;
    wp_reset_query(); ?>