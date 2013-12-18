<?php
/*
Template Name: Collection
*/
?>
<main role="main" id="main">
	<?php get_template_part( 'breadcrumb' ); ?>

	<section class="main-block collection-description">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php $page_id = $post->ID; ?>

			<?php the_content(); ?>

		<?php endwhile; ?>
	</section>

	<section class="main-block">
		<h1 class="block-title"><?php _e('Fondos fotográficos', 'museobog'); ?></h1>

		<?php get_template_part( 'loop', 'collection' ); ?>
	</section>

	<?php
	$args = array(
		'post_type' => 'page',
		'post_parent' => $page_id,
		'orderby' => 'menu_order',
		'order' => 'ASC'
	);
	$children = get_posts($args);

	foreach ($children as $key => $post):
		setup_postdata( $post );
	?>
		<section class="main-block" id="<?php echo $post->post_name; ?>">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</section>
	<?php
	endforeach;
	wp_reset_postdata();
	?>

	<section class="main-block home-featured">
		<h1 class="block-title"><?php _e('Obra destacada del mes', 'museobog'); ?></h1>
		<?php get_template_part( 'loop', 'featured' ); ?>
	</section>
