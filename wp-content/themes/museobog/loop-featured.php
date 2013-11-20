<?php
$featured_query = new WP_Query(array(
	'post_type' => 'work',
	'posts_per_page' => 1
));

while ( $featured_query->have_posts() ) : $featured_query->the_post();
?>

	<?php the_post_thumbnail('wide'); ?>
	<div class="social-share"></div>
	<?php the_excerpt(); ?>
	<p><a class="button" href="<?php the_permalink(); ?>"><?php _e('más información', 'museobog'); ?></a></p>

    <?php
endwhile;

/* Restore original Post Data */
wp_reset_postdata();
?>
