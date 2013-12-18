<?php
if ( is_post_type_archive('collection') ) {
	wp_redirect( get_museo_page_link('coleccion', false) );
	exit;
}
?>

<?php get_header( minimal_template_base() ); ?>

		<?php include minimal_template_path(); ?>

<?php get_footer( minimal_template_base() ); ?>
