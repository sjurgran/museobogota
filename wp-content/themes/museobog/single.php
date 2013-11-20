<main role="main" id="main">
	<?php get_template_part( 'breadcrumb' ); ?>

	<?php
	while ( have_posts() ) : the_post();
		$posttags = get_the_tags();
		if ($posttags) {
			$the_tag = reset($posttags);
		}
	?>
		<article <?php post_class(); ?>>

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
				<div class="social-share"></div>
				<p>Artículo creado: <time itemprop="dateCreated" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d/m/Y, g:i a'); ?></time></p>
				<p>Modificado: <time itemprop="dateModified" datetime="<?php the_modified_time('Y-m-d'); ?>"><?php the_modified_time('d/m/Y, g:i a'); ?></p>
			</div>

			<div class="related-articles">
				<h2><?php _e('Eventos Relacionados'); ?></h2>
			</div>

		</article>
	<?php endwhile; ?>
