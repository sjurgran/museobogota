<nav class="menu breadcrumb">
	<a class="crumb" href="<?php echo home_url('/'); ?>"><?php _e('inicio'); ?></a>

	<?php
	$before = '<span class="crumb">';
	$after = '<span>';

	if ( is_page() && ! $post->post_parent ) {
		echo $before . get_the_title() . $after;
	}
	?>
</nav>
