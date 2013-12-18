<main role="main" id="main">
	<?php get_template_part( 'breadcrumb' ); ?>

	<section class="main-block events-intro">
		<?php
			$language_prefix = pll_current_language();
			$language_intro_text_id = 'events_text_'.$language_prefix;
			$welcome = kc_get_option( 'museo', 'agenda_options', $language_intro_text_id );
			echo wpautop($welcome);
		?>
	</section>

	<section class="main-block">
		<h1 class="block-title"><?php _e('Calendario de eventos', 'museobog'); ?></h1>

		<div id="events-carousel" class="flexslider">
			<ul class="slides">
				<?php get_template_part( 'loop', 'carousel' ); ?>
			</ul>
		</div>
	</section>

	<section class="main-block">
		<h1 class="block-title"><?php _e('Historial', 'museobog'); ?></h1>

		<ul>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'event_item' ); ?>

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
		$base_url = get_post_type_archive_link('agenda') . '%_%';

		display_pagination($current_page, $total, $base_url, 'page/%#%');
		?>
	</section>
