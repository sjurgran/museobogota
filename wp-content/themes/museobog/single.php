<main role="main" id="main">
	<?php get_template_part( 'breadcrumb' ); ?>


	<article <?php post_class(); ?>>
		<?php
		while ( have_posts() ) : the_post();
			$posttags = get_the_tags();
			if ($posttags) {
				$the_tag = reset($posttags);
			}
		?>

			<?php the_post_thumbnail('full'); ?>

			<div class="article-info">
				<h1><?php the_title(); ?></h1>
				<h3><?php echo $the_tag->name; ?></h3>

				<?php the_excerpt(); ?>
			</div>

			<div class="article-content">
				<?php the_content(); ?>
			</div>

			<div class="article-meta">
				<div class="social-share">
					<ul id="sharrre">
						<li id="facebook-share" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Like"></li>
						<li id="twitter-share" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Tweet"></li>
					</ul>
				</div>

				<p>Artículo creado: <time itemprop="dateCreated" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d/m/Y, g:i a'); ?></time></p>
				<p>Modificado: <time itemprop="dateModified" datetime="<?php the_modified_time('Y-m-d'); ?>"><?php the_modified_time('d/m/Y, g:i a'); ?></p>
			</div>
		<?php endwhile; ?>

		<div class="related-articles">
			<h2><?php _e('Eventos Relacionados'); ?></h2>

			<ul>
				<?php
				$related_query = new WP_Query(array(
					'post_type' => 'agenda',
					'posts_per_page' => 2,
					'tag_id' => $the_tag->ID,
					'post__not_in' => array($post->ID),
					'orderby' => 'rand',
				));
				while ( $related_query->have_posts() ) : $related_query->the_post();
				?>

					<?php get_template_part( 'event_item' ); ?>

				<?php
				endwhile;

				/* Restore original Post Data */
				wp_reset_postdata();
				?>
			</ul>
		</div>

	</article>
