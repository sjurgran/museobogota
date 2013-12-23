<?php
$featured_query = new WP_Query(array(
	'post_type' => 'work',
	'posts_per_page' => 1
));

while ( $featured_query->have_posts() ) : $featured_query->the_post();
?>

<figure id="featured-img"><?php the_post_thumbnail('wide'); ?></figure>
<div id="content-footer-featured">
    <div class="social-share home-share">
        <ul id="sharrre">
            <li id="facebook-share" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Like"></li>
            <li id="twitter-share" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-title="Tweet"></li>
            <li id="flickr-fake-share"><a title="Visit Flickr" href="http://flickr.com"></a></li>
        </ul>
    </div>
	<?php the_excerpt(); ?>
    <p class="more-info-button"><a class="button" href="<?php the_permalink(); ?>"><?php _e('más información', 'museobog'); ?></a></p>
</div>
    <?php
endwhile;

/* Restore original Post Data */
wp_reset_postdata();
?>
