<?php
/**
 * Author: trac.nguyen (npbtrac@yahoo.com)
 * Date: 11/21/2014
 * Time: 3:42 PM
 *
 * Basic functions to setup a theme
 */

if (!function_exists('dss_setup')) {

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function dss_setup()
    {
        // Not to show admin bar
//        add_filter('show_admin_bar', '__return_false');

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on bwf, use a find and replace
         * to change _NP_TEXT_DOMAIN to the name of your theme in all the template files
         */
        load_theme_textdomain(_NP_TEXT_DOMAIN, _NP_TEMPLATE_PATH . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails', array( 'post','product' ));

        add_theme_support( 'automatic-feed-links' );

        add_theme_support( 'title-tag' );

        register_nav_menus( array(
            'primary' => __('Primary Menu', _NP_TEXT_DOMAIN),
            'footer' => __('Footer Menu', _NP_TEXT_DOMAIN),
            'sidebar' => __('Sidebar Menu', _NP_TEXT_DOMAIN),
        ) );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
    }
}
add_action('after_setup_theme', 'dss_setup');

if (!function_exists('dss_widgets_init')) {
    /**
     * Register widget area.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_sidebar
     */
    function dss_widgets_init()
    {
        register_sidebar(array(
            'name' => __('Sidebar', _NP_TEXT_DOMAIN),
            'id' => 'sidebar-1',
            'description' => '',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<header><h2 class="widget-title">',
            'after_title' => '</h2></header>',
        ));
    }
}
add_action('widgets_init', 'dss_widgets_init');

if (!function_exists('dss_scripts')) {
    /**
     * Enqueue scripts and styles.
     */
    function dss_scripts()
    {
        wp_enqueue_style('owl-carousel', _NP_TEMPLATE_URL . '/assets/owl-carousel/owl.carousel.css', array(), _NP_THEME_VERSION);
        wp_enqueue_style('owl-theme', _NP_TEMPLATE_URL . '/assets/owl-carousel/owl.theme.css', array(), _NP_THEME_VERSION);
        wp_enqueue_style('bx-slider', _NP_TEMPLATE_URL . '/assets/bx-slider/jquery.bxslider.css', array(), _NP_THEME_VERSION);
        wp_enqueue_style('responsive-tab', _NP_TEMPLATE_URL . '/assets/responsive-tabs/responsive-tabs.css', array(), _NP_THEME_VERSION);
        wp_enqueue_style('style-parent', _NP_TEMPLATE_URL . '/css/main.css', array(), _NP_THEME_VERSION);
        wp_enqueue_style('style-custom', _NP_TEMPLATE_URL . '/css/custom.css', array(), _NP_THEME_VERSION);
        if (_NP_TEMPLATE_URL != _NP_CHILD_TEMPLATE_URL) {
            wp_enqueue_style('style-child', _NP_CHILD_TEMPLATE_URL . '/css/style.css', array(), _NP_THEME_VERSION);
        }

        wp_enqueue_script('js',  _NP_TEMPLATE_URL . '/js/jquery-1.11.1.js', array(), _NP_THEME_VERSION, true);
        wp_enqueue_script('jquery',_NP_TEMPLATE_URL . '/js/jquery-ui-1.11.2/jquery-ui.js', array(), _NP_THEME_VERSION, true);
        wp_enqueue_script('skype',  'http://www.skypeassets.com/i/scom/js/skype-uri.js', array(), _NP_THEME_VERSION, true);
        wp_enqueue_script('modernizr',  _NP_TEMPLATE_URL . '/js/modernizr.js', array(), _NP_THEME_VERSION, true);
        wp_enqueue_script('detectizr',  _NP_TEMPLATE_URL . '/js/detectizr.js', array(), _NP_THEME_VERSION, true);

        wp_enqueue_script('bootstrap',  _NP_TEMPLATE_URL . '/js/bootstrap.js', array(), _NP_THEME_VERSION, true);
        wp_enqueue_script('responsive-tab',  _NP_TEMPLATE_URL . '/assets/responsive-tabs/jquery.responsiveTabs.min.js', array(), _NP_THEME_VERSION, true);
        wp_enqueue_script('owl-carousel',  _NP_TEMPLATE_URL . '/assets/owl-carousel/owl.carousel.js', array(), _NP_THEME_VERSION, true);
        wp_enqueue_script('bx-slider',  _NP_TEMPLATE_URL . '/assets/bx-slider/jquery.bxslider.js', array(), _NP_THEME_VERSION, true);
        wp_enqueue_script('main',  _NP_TEMPLATE_URL . '/js/main.js', array(), _NP_THEME_VERSION, true);
        wp_enqueue_script("jquery-ui-accordion");

        // js for threaded comments
        if (_NP_ALLOW_COMMENT && is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');

        }
    }
}
add_action('wp_enqueue_scripts', 'dss_scripts');

function dss_full_fill_link($link){

    $link = strtolower($link);
    $link = !$link || substr($link, 0, 7) == 'http://' || substr($link, 0, 8) == 'https://' ? $link : 'http://'.$link;

    return $link;
}