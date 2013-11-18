<?php
//get_permalink() returns the URL of the last post in The Loop, not the permalink for the current page
$base_url = get_permalink();

if ( get_query_var('page') ) {
	$current_page = get_query_var('page');
} else {
	$current_page = 1;
}

$collection_query = new WP_Query(array(
	'post_type' => 'collection',
	'posts_per_page' => 9,
	'paged' => $current_page
));

while ( $collection_query->have_posts() ) : $collection_query->the_post();

	$date = get_post_meta( $post->ID, "_date", true );
?>
	<div <?php post_class(); ?>>
		<?php the_post_thumbnail('big-thumb'); ?>
		<h2><?php the_title(); ?></h2>
		<h3><?php echo $date; ?></h3>
		<p><a class="button" href="<?php the_permalink(); ?>"><?php _e('más información', 'museobog'); ?></a></p>
	</div>
<?php
endwhile;

echo '<nav class="pagination">';

	$total = $collection_query->max_num_pages;
	echo paginate_links( array(
		'base' => $base_url.'%_%',
		'format' => '%#%',
		'current' => $current_page,
		'total' => $total,
		'prev_text' => '<',
		'next_text' => '>',
	) );

	echo '<span class="page_counter">';
	printf( _n( '', 'Página %s de %s', $total, 'museobog' ), $current_page, $total );
	echo '</span>';

echo '</nav>';

/* Restore original Post Data */
wp_reset_postdata();
?>
