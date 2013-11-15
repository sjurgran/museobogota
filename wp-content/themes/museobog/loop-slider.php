<?php
$slider_query = new WP_Query(array(
	'post_type' => 'slider',
	'posts_per_page' => 4
));

while ( $slider_query->have_posts() ) : $slider_query->the_post();

	$posttags = get_the_tags();
	if ($posttags) {
		$the_tag = reset($posttags);
	}

	$event_id = get_post_meta( $post->ID, "_link", true );
	$event_url = get_permalink( $event_id );
?>

	<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<a class="slider-picture" href="<?php echo $event_url; ?>">
			<?php the_post_thumbnail('full'); ?>
			<div class="slider-overlay">
				<h2 class="slider-title"><?php the_title(); ?></h2>
				<h3 class="slider-subtitle icon-plus"><?php echo $the_tag->name; ?></h3>
			</div>
		</a>
		<div class="slider-info">
			<?php the_excerpt(); ?>
		</div>
		<div class="slider-text">
			<?php the_content(); ?>
		</div>

		<p class="slider-more"><a class="button" href="<?php echo $event_url; ?>"><?php _e('más información', 'museobog'); ?></a></p>
	</li>

<?php
endwhile;

/* Restore original Post Data */
wp_reset_postdata();
?>
