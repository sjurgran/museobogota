<!DOCTYPE html>
<html  <?php language_attributes(); ?>>
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
	wp_enqueue_script( 'main', get_bloginfo('template_directory').'/js/main.js', array('jquery'), null, true);
	wp_head();
	?>
</head>
<body <?php body_class(); ?>>

	<header role="banner" id="header">
		<div class="logo">
			<a href="<?php echo home_url(); ?>/" rel="home">
				<h1><?php bloginfo('name');?></h1>
				<h2><?php bloginfo('description');?></h2>
			</a>
		</div>

		<div class="toggle-menu icon-menu replace-icon">menú</div>
		<nav id="main-nav" role="navigation">
			<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false)); ?>
		</nav>

		<div class="toggle-search icon-search replace-icon is-open">buscar</div>
		<?php get_search_form(); ?>
	</header>

	<!-- If you want to use an element as a wrapper, i.e. for styling only, then <div> is still the element to use -->
	<div class="wrap">
		<main role="main">
