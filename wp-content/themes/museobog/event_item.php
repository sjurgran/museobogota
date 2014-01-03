<?php
$posttags = get_the_tags();
if ($posttags) {
    $the_tag = reset($posttags);
}
$datePostStart = get_post_meta($post->ID, "_start_date", true);

$start_date = format_event_date($datePostStart);
$end_date = format_event_date(get_post_meta($post->ID, "_end_date", true));

$diff_today = diffDate($datePostStart);
$GLOBALS["diff"][] = $diff_today;
?>

<li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <a href="<?php the_permalink(); ?>">
        <time class="big-time"><?php echo $start_date; ?></time>
        <?php the_post_thumbnail(); ?>
        <div class="carousel-item-info">
            <h5><?php the_title(); ?></h5>

            <p><?php echo $the_tag->name; ?></p>
            <time><?php _e('Hasta', 'museobog'); ?> <?php echo $end_date; ?></time>
        </div>
    </a>
</li>
