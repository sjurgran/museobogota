<?php
global $post_type;
?>
<ul>
	<?php
	$featured_query = new WP_Query(array(
		'post_type' => $post_type,
		'posts_per_page' => -1
	));

	while ( $featured_query->have_posts() ) : $featured_query->the_post();
	?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	<?php
	endwhile;

	/* Restore original Post Data */
	wp_reset_postdata();
	?>
</ul>
