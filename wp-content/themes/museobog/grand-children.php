<?php
$args = array(
	'post_type' => 'page',
	'post_parent' => $post->ID,
	'orderby' => 'menu_order',
	'order' => 'ASC'
);
$children = get_posts($args);

foreach ($children as $key => $post):
	setup_postdata( $post );
?>
	<div class="sub-sub-page">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
	</div>
<?php
endforeach;
?>
