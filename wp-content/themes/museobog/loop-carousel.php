<?php
$carousel_query = new WP_Query(array(
	'post_type' => 'agenda',
	'posts_per_page' => 12
));

while ( $carousel_query->have_posts() ) : $carousel_query->the_post();

	$posttags = get_the_tags();
	if ($posttags) {
		$the_tag = reset($posttags);
	}

	$start_date = format_event_date(get_post_meta( $post->ID, "_start_date", true ));
	$end_date = format_event_date(get_post_meta( $post->ID, "_end_date", true ));
?>

	<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<a href="<?php the_permalink(); ?>">
			<time class="big-time"><?php echo $start_date; ?></time>
			<?php the_post_thumbnail(); ?>
			<h5 class="carousel-item-info">
				<?php the_title(); ?>
				<br />
				<?php echo $the_tag->name; ?>
				<time>Hasta <?php echo $end_date; ?></time>
			</h5>
		</a>
	</li>

<?php
endwhile;

/* Restore original Post Data */
wp_reset_postdata();
?>
