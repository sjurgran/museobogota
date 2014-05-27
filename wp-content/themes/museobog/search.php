<main role="main" id="main">
	<?php get_template_part( 'breadcrumb' ); ?>

	<section class="main-block search-results-block">
		<?php if ( have_posts() ) : ?>

			<h1 class="block-title"><?php printf( __( 'Resultados de búsqueda para: %s', 'museobog' ), get_search_query() ); ?></h1>

			<ul>
				<?php while ( have_posts() ) : the_post(); ?>

					<div <?php post_class(); ?>>
						<a href="<?php the_permalink(); ?>">
							<?php
							if (class_exists('MultiPostThumbnails') && MultiPostThumbnails::has_post_thumbnail(get_post_type(), 'small-img')) {
								MultiPostThumbnails::the_post_thumbnail(get_post_type(), 'small-img');
							} else {
								the_post_thumbnail();
							}
							?>
							<h2 class="sub-article-title"><?php the_title(); ?></h2>
						</a>
					</div>

				<?php endwhile; ?>
			</ul>

			<?php
			global $wp_query;
			if ( get_query_var('paged') ) {
				$current_page = get_query_var('paged');
			} else {
				$current_page = 1;
			}
			$total = $wp_query->max_num_pages;
			$base_url = get_search_link() . '%_%';

			display_pagination($current_page, $total, $base_url, 'page/%#%');
			?>

		<?php else : ?>
			<p><?php _e('No hemos encontrado resultados de búsqueda. Intenta buscar usando otras palabras.', 'museobog'); ?></p>
		<?php endif; ?>
	</section>
