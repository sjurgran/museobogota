<?php
if ( is_post_type_archive('collection') ) {
	$page_collection = get_page_by_path('coleccion');
	$collection_id = pll_get_post($page_collection->ID);
	wp_redirect( get_permalink($collection_id) );
	exit;
}
?>

<?php get_header( minimal_template_base() ); ?>

		<?php include minimal_template_path(); ?>

<?php get_footer( minimal_template_base() ); ?>
