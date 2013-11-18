<?php
$carousel_query = new WP_Query(array(
	'post_type' => 'agenda',
	'posts_per_page' => 12
));

while ( $carousel_query->have_posts() ) : $carousel_query->the_post();
?>

	<?php get_template_part( 'event_item' ); ?>

<?php
endwhile;

/* Restore original Post Data */
wp_reset_postdata();
?>
