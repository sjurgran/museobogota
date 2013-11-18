<?php
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
			<time><?php _e('Hasta', 'museobog'); ?> <?php echo $end_date; ?></time>
		</h5>
	</a>
</li>
