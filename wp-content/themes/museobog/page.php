<main role="main" id="main">
	<?php get_template_part( 'breadcrumb' ); ?>

	<section class="main-block">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php $page_id = $post->ID; ?>

			<?php the_content(); ?>

		<?php endwhile; ?>
	</section>

	<?php
	$categories = get_categories( array('order' => 'DESC') );
	$categories = array_values($categories);//reset array keys

	$args = array(
		'post_type' => 'page',
		'post_parent' => $page_id,
		'orderby' => 'menu_order',
		'order' => 'ASC'

	);
	$children = get_posts($args);

	foreach ($children as $key => $sub_page):
	?>

		<section class="main-block">
			<h1><?php echo $categories[$key]->name; ?></h1>
			<p><?php echo $categories[$key]->description; ?></p>

			<?php
			$cat_posts = get_posts( array('cat' => $categories[$key]->cat_ID) );

			$img_size = ($categories[$key]->slug == 'contacto') ? 'half' : 'big-thumb';

			foreach ($cat_posts as $key => $post) {
				setup_postdata( $post );
			?>
				<article <?php post_class(); ?>>
					<?php the_post_thumbnail($img_size); ?>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</article>
			<?php
			}
			?>
		</section>

		<?php
		$post = $sub_page;
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
