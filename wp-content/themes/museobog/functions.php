<?php
/**
 * Register latest jQuery, load on footer
 */
function minimal_jquery_script() {
	if ( ! is_admin() ) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2', true);
	}
}
add_action('wp_enqueue_scripts', 'minimal_jquery_script');

/**
 * Theme setup
 */
function minimal_theme_setup() {
	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support('automatic-feed-links');

	// Custom menu support.
	register_nav_menus( array(
		'primary' => 'Primary Menu',
		'social' => 'Social Networks'
	) );

	// Most themes need featured images.
	add_theme_support('post-thumbnails' );
}
add_action('after_setup_theme', 'minimal_theme_setup');

/**
 * Remove code from the <head>
 */
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);// http://www.tech-evangelist.com/2011/09/05/disable-remove-wordpress-shortlink/
//remove_action('wp_head', 'rsd_link'); // Might be necessary if you or other people on this site use remote editors.
//remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
//remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
//remove_action('wp_head', 'index_rel_link'); // Displays relations link for site index
remove_action('wp_head', 'wlwmanifest_link'); // Might be necessary if you or other people on this site use Windows Live Writer.
//remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
//remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.

// http://justintadlock.com/archives/2010/07/08/lowercase-p-dangit
remove_filter( 'the_title', 'capital_P_dangit', 11 );
remove_filter( 'the_content', 'capital_P_dangit', 11 );
remove_filter( 'comment_text', 'capital_P_dangit', 31 );

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

	static function wrap( $template ) {
		self::$main_template = $template;

		self::$base = substr( basename( self::$main_template ), 0, -4 );

		if ( 'index' == self::$base )
			self::$base = false;

		$templates = array( 'base.php' );

		if ( self::$base )
			array_unshift( $templates, sprintf( 'base-%s.php', self::$base ) );

		return locate_template( $templates );
	}
}
add_filter('template_include', array('Minimal_Wrapping', 'wrap'), 99);

/**
 * Custom post types
 */
function museo_custom_post_types() {
	$args = array(
		'public' => true,
		'label'  => 'Slider',
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies' => array('post_tag')
	);
	register_post_type( 'slider', $args );

	$args = array(
		'public' => true,
		'label'  => __('Events', 'museobog'),
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies' => array('post_tag')
	);
	register_post_type( 'agenda', $args );
}
add_action('init', 'museo_custom_post_types');

/**
 * Custom fields
 */
function museo_custom_fields( $groups ) {
	$my_group = array(
		'agenda' => array(
			array(
				'id'     => 'dates',
				'title'  => __('Dates', 'museobog'),
				'fields' => array(
					array(
						'id'      => 'start_date',
						'title'   => __('Start Date', 'museobog'),
						'type'    => 'date',
						'default' => date('Y-m-d'),
						'desc'    => 'Format: <code>'.date('Y-m-d').'</code>'
					),
					array(
						'id'      => 'end_date',
						'title'   => __('End Date', 'museobog'),
						'type'    => 'date',
						'default' => date('Y-m-d'),
						'desc'    => 'Format: <code>'.date('Y-m-d').'</code>'
					)
				)
			)
		),
		'slider' => array(
			array(
				'id'     => 'info',
				'title'  => __('Info', 'museobog'),
				'fields' => array(
					array(
						'id'      => 'link',
						'title'   => __('Link', 'museobog'),
						'type'    => 'select',
						'options' => array('kcSettings_options_cb', 'posts'),
						'args'    => array(
							'post_type' => 'agenda',
							'args' => array('posts_per_page' => -1)
						)
					)
				)
			)
		)
	);

	$groups[] = $my_group;
	return $groups;
}
add_filter( 'kc_post_settings', 'museo_custom_fields' );

?>
