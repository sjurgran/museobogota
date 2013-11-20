<?php
$carousel_query = new WP_Query(array(
    'post_type' => 'work',
    'posts_per_page' => 1
        ));

while ($carousel_query->have_posts()) : $carousel_query->the_post();
    ?>

    <?php the_post_thumbnail('wide'); ?>
    <div class="social-share">
        <ul>
            <li>
                <a title="facebook" href="http://facebook.com"></a>
                <span>Like</span>
                <div class="box-likes">106</div>
            </li>
            <li>
                <a title="twitter" href="http://twitter.com"></a>
                <span>Tweet</span>
                <div class="box-likes">61</div>
            </li>
            <li><a title="flickr" href="http://flickr.com"></a></li>
        </ul>
    </div>
    <?php the_excerpt(); ?>
    <p class="center" ><a class="button" href="<?php the_permalink(); ?>"><?php _e('más información', 'museobog'); ?></a></p>

    <?php
endwhile;

/* Restore original Post Data */
wp_reset_postdata();
?>
