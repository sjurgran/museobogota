<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
       	<meta charset="<?php bloginfo('charset'); ?>">

        <title><?php bloginfo('name'); ?><?php wp_title(' | '); ?></title>

        <meta name="description" content="<?php bloginfo('description'); ?>">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/styles.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

        <!--[if lt IE 9]>
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/ie8.css">
        <script src="<?php bloginfo('template_directory'); ?>/js/html5shiv.js" media="all"></script>
        <![endif]-->

        <?php
        wp_enqueue_script('flexslider', get_bloginfo('template_directory') . '/js/jquery.flexslider.js', array('jquery'), '2.2.0', true);
        wp_enqueue_script('sharrre', get_bloginfo('template_directory') . '/js/jquery.sharrre.min.js', array('jquery'), '1.3.5', true);
        wp_enqueue_script('bpopup', get_bloginfo('template_directory') . '/js/jquery.bpopup.min.js', array('jquery'), '0.9.4', true);
        wp_enqueue_script('main', get_bloginfo('template_directory') . '/js/main.js', array('jquery'), null, true);
        wp_head();
        ?>

        <!--[if lt IE 9]>
        <script src="<?php bloginfo('template_directory'); ?>/js/selectivizr-min.js" media="all"></script>
        <script src="<?php bloginfo('template_directory'); ?>/js/respond.min.js" media="all"></script>
        <![endif]-->
    </head>
    <body <?php body_class(); ?>>

        <div id="letra" class="modal">
            <span class="b-close">x</span>
            <?php
                $language_prefix = pll_current_language();
                $language_font_text_id = 'font_size_'.$language_prefix;
                $font_size = kc_get_option( 'museo', 'site_options', $language_font_text_id );
                echo wpautop($font_size);
            ?>
        </div>

        <header role="banner" id="header">
            <nav id="language-nav">
                <ul class="menu menu-language">
                    <?php pll_the_languages(array('hide_if_empty' => 0)); ?>
                    <li class="lang-item lang-item-font">
                        <a class="popup" href="#letra"><?php _e('Tamaño de letra', 'museobog'); ?></a>
                    </li>
                </ul>
            </nav>

            <a href="<?php echo pll_home_url('/'); ?>" rel="home">
                <h1 id="logo-scroll">b</h1>
                <div class="logo">
                    <h1><?php bloginfo('name'); ?></h1>
                    <h2><?php bloginfo('description'); ?></h2>
                </div>
            </a>


            <div class="toggle-menu icon-menu replace-icon"><?php _e('menú', 'museobog'); ?></div>
            <nav id="main-nav" role="navigation">
                <div id="logo-menu">b</div>
                <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false)); ?>
            </nav>

            <div class="toggle-search icon-search replace-icon is-open"><?php _e('buscar', 'museobog'); ?></div>
            <?php get_search_form(); ?>

            <div id="content-header-rigth">
                <div id="logo-bogota">
                    <img src="<?php bloginfo('template_directory'); ?>/images/logo_bogota_ByN.svg" alt="Logo Bogota" onerror="this.onerror=null; this.src='<?php bloginfo('template_directory'); ?>/images/logo_bogota_ByN.png'"/>
                </div>

                <nav id="social-nav">
                    <?php wp_nav_menu(array('theme_location' => 'social', 'container' => false)); ?>
                </nav>
            </div>
        </header>

        <!-- If you want to use an element as a wrapper, i.e. for styling only, then <div> is still the element to use -->
        <div class="wrap">
