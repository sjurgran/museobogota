<?php
/*
Template Name: Sitemap
*/
global $post_type;
?>
<main role="main" id="main">
	<?php get_template_part('breadcrumb'); ?>

	<section class="main-block">
		<?php
			$page_el_museo = get_page_by_path('el-museo');
			$el_museo_id = pll_get_post($page_el_museo->ID);
		?>
		<h2><a href="<?php echo get_permalink($el_museo_id); ?>"><?php echo get_the_title($el_museo_id); ?></a></h2>
	</section>

	<section class="main-block">
		<?php
			$post_type = 'collection';
			$archive_link = get_post_type_archive_link($post_type);
			$archive_title = get_post_type_object($post_type)->labels->singular_name;
		?>
		<h2><?php printf('<a href="%s">%s</a>', $archive_link, $archive_title); ?></h2>
		<?php get_template_part( 'loop', 'sitemap' ); ?>
	</section>

	<section class="main-block">
		<?php
			$post_type = 'agenda';
			$archive_link = get_post_type_archive_link($post_type);
			$archive_title = get_post_type_object($post_type)->labels->singular_name;
		?>
		<h2><?php printf('<a href="%s">%s</a>', $archive_link, $archive_title); ?></h2>
		<?php get_template_part( 'loop', 'sitemap' ); ?>
	</section>

	<section class="main-block">
		<?php $post_type = 'work'; ?>
		<h2><?php echo get_post_type_object($post_type)->labels->singular_name; ?></h2>
		<?php get_template_part( 'loop', 'sitemap' ); ?>
	</section>
