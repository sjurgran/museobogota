<?php

/**
 * Register latest jQuery, load on footer
 */
function minimal_jquery_script() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2');
    }
}

add_action('wp_enqueue_scripts', 'minimal_jquery_script');

/**
 * Theme setup
 */
function minimal_theme_setup() {
    load_theme_textdomain('museobog', get_template_directory() . '/languages');

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support('automatic-feed-links');

    // Custom menu support.
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'social' => 'Social Networks'
    ));

    // Most themes need featured images.
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(156, 156, true);
    add_image_size('slide', 1400, 586, true);
    add_image_size('gallery', 1000, 640);
    add_image_size('wide', 996, 999); //996 pixels wide (and "unlimited" height)
    add_image_size('half', 588, 391, true);
    add_image_size('big-thumb', 384, 384, true);

    //disable cleaner gallery stylesheet
    add_theme_support( 'cleaner-gallery' );
}

add_action('after_setup_theme', 'minimal_theme_setup');

/**
 * Remove code from the <head>
 */
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // http://www.tech-evangelist.com/2011/09/05/disable-remove-wordpress-shortlink/
//remove_action('wp_head', 'rsd_link'); // Might be necessary if you or other people on this site use remote editors.
//remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
//remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
//remove_action('wp_head', 'index_rel_link'); // Displays relations link for site index
remove_action('wp_head', 'wlwmanifest_link'); // Might be necessary if you or other people on this site use Windows Live Writer.
//remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
//remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.
// http://justintadlock.com/archives/2010/07/08/lowercase-p-dangit
remove_filter('the_title', 'capital_P_dangit', 11);
remove_filter('the_content', 'capital_P_dangit', 11);
remove_filter('comment_text', 'capital_P_dangit', 31);

// Hide the version of WordPress you're running from source and RSS feed // Want to JUST remove it from the source? Try: remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_false');

/**
 * Theme wrapper
 *
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */
function minimal_template_path() {
    return Minimal_Wrapping::$main_template;
}

function minimal_template_base() {
    return Minimal_Wrapping::$base;
}

class Minimal_Wrapping {

    // Stores the full path to the main template file
    static $main_template;
    // Stores the base name of the template file; e.g. 'page' for 'page.php' etc.
    static $base;

    static function wrap($template) {
        self::$main_template = $template;

        self::$base = substr(basename(self::$main_template), 0, -4);

        if ('index' == self::$base)
            self::$base = false;

        $templates = array('base.php');

        if (self::$base)
            array_unshift($templates, sprintf('base-%s.php', self::$base));

        return locate_template($templates);
    }

}

add_filter('template_include', array('Minimal_Wrapping', 'wrap'), 99);

/**
 * Custom post types
 */
function museo_custom_post_types() {
    $args = array(
        'public' => true,
        'label' => 'Slider',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
    );
    register_post_type('slider', $args);

    $args = array(
        'public' => true,
        'label' => __('Eventos', 'museobog'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies' => array('post_tag'),
        'has_archive' => true
    );
    register_post_type('agenda', $args);

	$args = array(
		'public' => true,
		'label'  => __('Colecciones', 'museobog'),
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies' => array('post_tag'),
		'has_archive' => true
	);
	register_post_type( 'collection', $args );

    $args = array(
        'public' => true,
        'label' => __('Obras', 'museobog'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'taxonomies' => array('post_tag')
    );
    register_post_type('work', $args);
}
add_action('init', 'museo_custom_post_types');

/**
 * Taxonomies
 */
function museo_taxonomies() {
    register_taxonomy( 'type', array('agenda', 'collection', 'work'), array(
        'labels'       => array(
            'name'               => __('Tipos', 'museobog'),
            'singular_name'      => __('Tipo', 'museobog'),
            'add_new_item'       => __('Añadir Nuevo Tipo', 'museobog'),
            'edit_item'          => __('Editar Tipo', 'museobog'),
            'new_item'           => __('Nuevo Tipo', 'museobog'),
            'view_item'          => __('Ver Tipo', 'museobog'),
            'search_items'       => __('Buscar Tipos', 'museobog'),
            'not_found'          => __('No se encontro Tipo', 'museobog'),
            'not_found_in_trash' => __('No se encontro Tipo en papelera', 'museobog'),
            'parent_item_colon'  => __('Tipo padre', 'museobog')
        ),
        'show_admin_column' => true,
        'hierarchical' => true
    ) );
}
add_action( 'init', 'museo_taxonomies' );

function museo_additional_img() {
    if (class_exists('MultiPostThumbnails')) {
        new MultiPostThumbnails(
            array(
                'label' => __('Imagen pequeña', 'museobog'),
                'id' => 'small-img',
                'post_type' => 'agenda'
            )
        );
    }
}
add_action( 'init', 'museo_additional_img' );

/**
 * Widgets
 */
function museo_widgets_init() {

    register_sidebar(array(
        'name' => 'Footer',
        'id' => 'footer',
        'before_widget' => '<div id="%1$s" class="widget footer-block %2$s">',
        'after_widget' => '</div>',
    ));
}

add_action('widgets_init', 'museo_widgets_init');

/**
 * Custom fields
 */
function museo_custom_fields($groups) {
    $subtitle = array(
        'id' => 'subtitle',
        'title' => __('Subtitulo', 'museobog'),
        'type' => 'text'
    );

    $my_group = array(
        'agenda' => array(
            array(
                'id' => 'info',
                'title' => __('Info', 'museobog'),
                'fields' => array(
                    $subtitle,
                    array(
                        'id' => 'start_date',
                        'title' => __('Fecha de inicio', 'museobog'),
                        'type' => 'text',
                        'default' => date('Y-m-d'),
                        'desc' => 'Format: <code>' . date('Y-m-d') . '</code>'
                    ),
                    array(
                        'id' => 'end_date',
                        'title' => __('Fecha final', 'museobog'),
                        'type' => 'text',
                        'default' => date('Y-m-d'),
                        'desc' => 'Format: <code>' . date('Y-m-d') . '</code>'
                    )
                )
            )
        ),
        'slider' => array(
            array(
                'id' => 'info',
                'title' => __('Info', 'museobog'),
                'fields' => array(
                    $subtitle,
                    array(
                        'id' => 'link',
                        'title' => __('Enlace', 'museobog'),
                        'type' => 'select',
                        'options' => array('kcSettings_options_cb', 'posts'),
                        'args' => array(
                            'post_type' => 'agenda',
                            'args' => array('posts_per_page' => -1)
                        )
                    )
                )
            )
        ),
        'collection' => array(
            array(
                'id' => 'info',
                'title' => __('Info', 'museobog'),
                'fields' => array(
                    $subtitle,
                    array(
                        'id' => 'date',
                        'title' => __('Fecha', 'museobog'),
                        'type' => 'text'
                    )
                )
            )
        ),
        'work' => array(
            array(
                'id' => 'info',
                'title' => __('Info', 'museobog'),
                'fields' => array(
                    $subtitle
                )
            )
        )
    );

    $groups[] = $my_group;
    return $groups;
}
add_filter('kc_post_settings', 'museo_custom_fields');

/**
 * Opciones y textos del tema
 */
function museo_theme_options( $settings ) {
    $options = array(
        array(
            'id'     => 'agenda_options',
            'title'  => 'Agenda',
            'fields' => array(
                array(
                    'id'      => 'events_text_es',
                    'title'   => 'Texto inicial Agenda',
                    'type'    => 'editor'
                ),
                array(
                    'id'      => 'events_text_en',
                    'title'   => 'Texto inicial Agenda Inglés',
                    'type'    => 'editor'
                )
            )
        ),
        array(
            'id'     => 'site_options',
            'title'  => 'Sitio',
            'fields' => array(
                array(
                    'id'      => 'font_size_es',
                    'title'   => 'Tamaño de letra',
                    'type'    => 'editor'
                ),
                array(
                    'id'      => 'font_size_en',
                    'title'   => 'Tamaño de letra Inglés',
                    'type'    => 'editor'
                )
            )
        )
    );

    $my_settings = array(
        'prefix'        => 'museo',
        'menu_location' => 'themes.php',
        'menu_title'    => 'Opciones Generales',
        'page_title'    => 'Opciones Generales',
        'options'       => $options
    );

    $settings[] = $my_settings;
    return $settings;
}
add_filter( 'kc_plugin_settings', 'museo_theme_options' );

/**
 * Format dates for carousel
 */
function format_event_date($date) {
    if (!$date) {
        return date('Y');
    }

    $months = array('ene', 'feb', 'mar', 'abr', 'may', 'jun', 'jul', 'ago', 'sep', 'oct', 'nov', 'dic');

    $date_array = explode('-', $date);
    if (!isset($date_array[1])) {
        return $date_array[0];
    }

    $month = $months[$date_array[1] - 1];

    if (!isset($date_array[2])) {
        return $month . ' ' . $date_array[0];
    } else {
        return $date_array[2] . '/' . $month . '/' . $date_array[0];
    }
}

/**
 * Number of events
 */
function events_pagesize($query) {
    if (is_admin() || ! $query->is_main_query()) {
        return;
    }

    if (is_post_type_archive('agenda')) {
        $query->set('posts_per_page', 18);
        $query->set('order', 'DESC');
        $query->set('orderby', 'meta_value');
        $query->set('meta_key', '_start_date');
        return;
    }
}
add_action('pre_get_posts', 'events_pagesize', 1);

/**
 * Pagination
 */
function display_pagination($current_page, $total, $base_url = '', $format = '') {
    echo '<nav class="pagination">';

    $args = array(
        'current' => $current_page,
        'total' => $total,
        'prev_text' => '<',
        'next_text' => '>',
    );
    if ($base_url) {
        $args['base'] = $base_url;
    }
    if ($format) {
        $args['format'] = $format;
    }
    echo paginate_links($args);

    echo '<span class="page_counter">';
    printf(_n('', 'página %s de %s', $total, 'museobog'), $current_page, $total);
    echo '</span>';

    echo '</nav>';
}

/**
 * Título de imágen antes del caption en la gaĺería
 */
function add_title_before_caption($caption, $img_id) {
    $output = '<span class="open-caption caption-btn">i</span>';
    $output .= '<span class="close-caption caption-btn">x</span>';
    $output .= '<h4 class="gallery-title">'.get_the_title($img_id).'</h4>';
    $output .= '<p>'.$caption.'</p>';
    return $output;
}
add_filter( 'cleaner_gallery_caption', 'add_title_before_caption', 20, 2 );

/**
 * Wrap para la galería con Flex Slider
 */
function flex_gallery( $output) {
    return '<div id="gallery-slider" class="flexslider">' . $output . '</div>';
}
add_filter( 'post_gallery', 'flex_gallery', 10, 4 );


/**
 * Search SEO friendly
 */
function search_url_rewrite_rule() {
    if ( is_search() && !empty($_GET['s'])) {
        wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
        exit();
    }
}
add_action('template_redirect', 'search_url_rewrite_rule');

function search_only_custom_post_types( $query ) {
    if ( $query->is_search() ) {
        $query->set( 'post_type', array('agenda','collection', 'work') );
    }
    return $query;
}
add_filter('pre_get_posts','search_only_custom_post_types');


/**
 * get page link in the current language, used in footer, sitemap and base (collection archive redirection)
 */
function get_museo_page_link($slug, $echo_anchor=true, $subpage='') {

    $page_object = get_page_by_path($slug);
    $pll_page_id = pll_get_post($page_object->ID);
    $page_title = get_the_title($pll_page_id);
    $page_link = get_permalink($pll_page_id);

    if ($subpage) {
        $page_link .= '#'.$subpage;
    }

    if ($echo_anchor) {
        printf('<a href="%s">%s</a>', $page_link, $page_title);
    } else {
        return $page_link;
    }
}

//
function diffDate($datei) {
    if ( strlen($datei) == 4 ) {
        $datei .= '-01-01';
    }
    $datef = date("Y-m-d");
    $datetime1 = new DateTime($datei);
    $datetime2 = new DateTime($datef);
    $interval = $datetime1->diff($datetime2);
    (int) $intervals = $interval->format('%a');
    return $intervals;
}

//
function indexLower($array) {

    $positionLower = $array[0];
    $lower = 0;
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] <= $positionLower) {
            $positionLower = $array[$i];
            $lower = $i;
        }
    }
    echo $lower;
}
