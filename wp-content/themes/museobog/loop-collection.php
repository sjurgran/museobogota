<?php
//get_permalink() returns the URL of the last post in The Loop, not the permalink for the current page
$base_url = get_permalink().'%_%';

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
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('big-thumb'); ?></a>
		<h2><?php the_title(); ?></h2>
		<h3><?php echo $date; ?></h3>
		<p><a class="button" href="<?php the_permalink(); ?>"><?php _e('más información', 'museobog'); ?></a></p>
	</div>
<?php
endwhile;

$total = $collection_query->max_num_pages;

display_pagination($current_page, $total, $base_url, '%#%');

/* Restore original Post Data */
wp_reset_postdata();
?>
