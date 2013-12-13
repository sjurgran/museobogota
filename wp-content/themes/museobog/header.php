<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<title><?php bloginfo('name'); ?><?php wp_title(' | '); ?></title>

	<meta name="description" content="<?php bloginfo('description'); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/normalize.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/styles.css">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!--[if lt IE 9]><script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js" media="all"></script><![endif]-->

	<?php
        wp_enqueue_script('flexslider', get_bloginfo('template_directory').'/js/jquery.flexslider-min.js', array('jquery'), '2.2.0', true);
	wp_enqueue_script('sharrre', get_bloginfo('template_directory').'/js/jquery.sharrre.min.js', array('jquery'), '1.3.5', true);
	wp_enqueue_script('main', get_bloginfo('template_directory').'/js/main.js', array('jquery'), null, true);
	wp_head();
	?>
</head>
<body <?php body_class(); ?>>

	<header role="banner" id="header">
		<nav id="language-nav">
			<ul class="menu menu-language">
				<?php pll_the_languages(array('hide_if_empty' => 0)); ?>
			</ul>
		</nav>

		<div class="logo">
			<a href="<?php echo pll_home_url('/'); ?>" rel="home">
				<h1><?php bloginfo('name'); ?></h1>
				<h2><?php bloginfo('description'); ?></h2>
			</a>
		</div>

		<div class="toggle-menu icon-menu replace-icon"><?php _e('menú', 'museobog'); ?></div>
		<nav id="main-nav" role="navigation">
			<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false)); ?>
		</nav>

		<div class="toggle-search icon-search replace-icon is-open"><?php _e('buscar', 'museobog'); ?></div>
		<?php get_search_form(); ?>

		<nav id="social-nav">
			<img src="<?php bloginfo('template_directory'); ?>/images/logo_bogota_ByN.svg" class="img_bogota_header"/>
			<?php wp_nav_menu(array('theme_location' => 'social', 'container' => false)); ?>
		</nav>
	</header>

	<!-- If you want to use an element as a wrapper, i.e. for styling only, then <div> is still the element to use -->
	<div class="wrap">
