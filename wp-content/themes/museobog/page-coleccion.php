<?php
/*
Template Name: Collection
*/
?>
<main role="main" id="main">
	<?php get_template_part( 'breadcrumb' ); ?>

	<section class="main-block">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php $page_id = $post->ID; ?>

			<?php the_content(); ?>

		<?php endwhile; ?>
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
		<section class="main-block">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</section>
	<?php
	endforeach;
	wp_reset_postdata();
	?>

	<section class="main-block">
		<h1 class="block-title"><?php _e('Obra destacada del mes', 'museobog'); ?></h1>

			<?php get_template_part( 'loop', 'featured' ); ?>
		</div>
	</section>