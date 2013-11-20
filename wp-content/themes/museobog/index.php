<div id="main-slider" class="flexslider">
	<ul class="slides">
		<?php get_template_part( 'loop', 'slider' ); ?>
	</ul>
</div>

<main role="main" id="main">
	<section class="main-block">
		<h1 class="block-title"><?php _e('Calendario de eventos', 'museobog'); ?></h1>

		<div id="events-carousel" class="flexslider">
			<ul class="slides">
				<?php get_template_part( 'loop', 'carousel' ); ?>
			</ul>
		</div>
	</section>

	<section class="main-block">
		<h1 class="block-title"><?php _e('Obra destacada del mes', 'museobog'); ?></h1>

		<?php get_template_part( 'loop', 'featured' ); ?>
	</section>
