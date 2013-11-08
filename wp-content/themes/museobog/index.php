<section class="slider">
	<?php
	$slider_query = new WP_Query(array(
		'post_type' => 'slider'
	));

	while ( $slider_query->have_posts() ) : $slider_query->the_post();

		$posttags = get_the_tags();
		$the_tag = reset($posttags);
	?>

		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<div class="slider-picture">
				<?php the_post_thumbnail('full'); ?>
				<div class="slider-overlay">
					<h2 class="slider-title"><?php the_title(); ?></h2>
					<h3 class="slider-subtitle"><?php echo $the_tag->name; ?></h3>
				</div>
			</div>
			<div class="slider-info">
				<?php the_excerpt(); ?>
			</div>
			<div class="slider-text">
				<?php the_content(); ?>
			</div>
		</article>

	<?php
	endwhile;

	/* Restore original Post Data */
	wp_reset_postdata();
	?>
</section>

<main role="main">
