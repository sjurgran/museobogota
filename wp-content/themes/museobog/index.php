<div id="main-slider" class="flexslider">
	<ul class="slides">
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

			<p class="slider-more"><a class="button" href="<?php echo $event_url; ?>">más información</a></p>
		</li>

	<?php
	endwhile;

	/* Restore original Post Data */
	wp_reset_postdata();
	?>
	</ul>
</div>

<main role="main" id="main">
	<section class="main-block">
		<h1 class="block-title">Calendario de eventos</h1>

		<div id="events-carousel" class="flexslider">
			<ul class="slides">
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
			</ul>
		</div>
	</section>
