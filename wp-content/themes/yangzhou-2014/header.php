<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="main-container" class="site-wrapper">
    <div class="site-inner">

        <header id="main-header" class="site-header" role="banner">
            <div class="header-top-line">
                <div class="container">
                    <div class="row">
                        <div class="contact-content">
                            <div class="contact-icon"></div>
                            <p class="contact-text"><?php echo get_field('contact_text');?></p>
                        </div>
                        <div class="skype-content">
                            <div class="skype-icon"></div>
                            <p class="skype-text"><a href="skype:<?php echo get_field('skype_name')?>?call">Call Us!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">

                <div class="row">
                    <?php
                    $main_logo_id = get_field('main_logo', 'option');
                    ?>
                    <a class="main-logo" href="<?php echo get_home_url() ?>" title="<?php echo __('Siglar', _NP_TEXT_DOMAIN) ?>"><?php echo wp_get_attachment_image($main_logo_id, 'medium') ?></a>



                    <div class="navbar navbar-default main-navigation">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#site-navigation" aria-expanded="false" aria-controls="site-navigation">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <nav id="site-navigation" class="navbar-collapse collapse" role="navigation">
                            <?php wp_nav_menu(
                                array(
                                    'theme_location' => 'primary',
                                    'walker' => new Bootstrap_Nav_Walker,
                                    'menu_class' => 'menu nav navbar-nav'
                                )
                            ); ?>
                        </nav>
                    </div>
                    <div class="search-content">
                        <div class="search-title"><p><?php echo get_field('search_title');?></p></div>
                        <form class="search-form" action="<?php echo home_url() ?>" method="GET">
                            <?php
                            $s = isset($_REQUEST['s']) ? $_REQUEST['s'] : '';
                            ?>
                            <input type="text" value="<?php echo $s ?>" name="s" placeholder="<?php echo __('Search', _NP_TEXT_DOMAIN) ?>" />
                            <button><span class="glyphicon" aria-hidden="true">Search</span></button>
                        </form>
                    </div>

                </div>

            </div>
        </header>
        <!-- #masthead -->

        <div id="main-content" class="site-content">
