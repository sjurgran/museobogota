<nav class="menu breadcrumb">
	<a class="crumb" href="<?php echo pll_home_url('/'); ?>"><?php _e('inicio', 'museobog'); ?></a>

	<?php
	$before = '<span class="crumb">';
	$after = '</span>';

	if ( is_single() ) {
		$post_type = get_post_type();
		$archive_link = get_post_type_archive_link($post_type);
		$archive_title = get_post_type_object($post_type)->labels->singular_name;
		printf('<a href="%s">%s</a>', $archive_link, $archive_title);
	}

	if ( (is_single() || is_page()) && ! $post->post_parent ) {
		echo $before . get_the_title() . $after;
	} elseif ( is_post_type_archive() ) {
		echo $before . post_type_archive_title('', false) . $after;
	}
	?>
</nav>
