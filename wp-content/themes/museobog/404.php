<main role="main" id="main">
	<?php get_template_part('breadcrumb'); ?>

	<article>
		<h1><?php _e('No hemos encontrado lo que buscabas', 'museobog'); ?></h1>

		<p><?php printf( __( 'Puedes regresar al <a href="%s">inicio</a> o realizar una búsqueda.', 'museobog' ), esc_url( pll_home_url('/') ) ); ?></p>
	</article>
