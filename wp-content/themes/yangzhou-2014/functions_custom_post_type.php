<?php
/**
 * Author: trac.nguyen (npbtrac@yahoo.com)
 * Date: 11/28/2014
 * Time: 5:52 PM
 *
 * For adding and update details for custom post type
 */

if (!function_exists('yangzhou_product_init()')) {
    /**
     * Register a event post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function yangzhou_product_init()
    {
        $labels = array(
            'name' => _x('Products', 'post type general name', _NP_TEXT_DOMAIN),
            'singular_name' => _x('Product', 'post type singular name', _NP_TEXT_DOMAIN),
            'menu_name' => _x('Products', 'admin menu', _NP_TEXT_DOMAIN),
            'name_admin_bar' => _x('Product', 'add new on admin bar', _NP_TEXT_DOMAIN),
            'add_new' => _x('Add New', 'product', _NP_TEXT_DOMAIN),
            'add_new_item' => __('Add New Product', _NP_TEXT_DOMAIN),
            'new_item' => __('New Product', _NP_TEXT_DOMAIN),
            'edit_item' => __('Edit Product', _NP_TEXT_DOMAIN),
            'view_item' => __('View Product', _NP_TEXT_DOMAIN),
            'all_items' => __('All Products', _NP_TEXT_DOMAIN),
            'search_items' => __('Search Products', _NP_TEXT_DOMAIN),
            'parent_item_colon' => __('Parent Product:', _NP_TEXT_DOMAIN),
            'not_found' => __('No Products found.', _NP_TEXT_DOMAIN),
            'not_found_in_trash' => __('No products found in Trash.', _NP_TEXT_DOMAIN)
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'product'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 10,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
        );

        register_post_type('product', $args);
    }
}
add_action( 'init', 'yangzhou_product_init' );


if (!function_exists('siglar_policy_init')) {
    /**
     * Register a policy post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function siglar_policy_init()
    {
        $labels = array(
            'name' => _x('Policies', 'post type general name', _NP_TEXT_DOMAIN),
            'singular_name' => _x('Policy', 'post type singular name', _NP_TEXT_DOMAIN),
            'menu_name' => _x('Policies', 'admin menu', _NP_TEXT_DOMAIN),
            'name_admin_bar' => _x('Policy', 'add new on admin bar', _NP_TEXT_DOMAIN),
            'add_new' => _x('Add New', 'policy', _NP_TEXT_DOMAIN),
            'add_new_item' => __('Add New Policy', _NP_TEXT_DOMAIN),
            'new_item' => __('New Policy', _NP_TEXT_DOMAIN),
            'edit_item' => __('Edit Policy', _NP_TEXT_DOMAIN),
            'view_item' => __('View Policy', _NP_TEXT_DOMAIN),
            'all_items' => __('All Policies', _NP_TEXT_DOMAIN),
            'search_items' => __('Search Policies', _NP_TEXT_DOMAIN),
            'parent_item_colon' => __('Parent Policy:', _NP_TEXT_DOMAIN),
            'not_found' => __('No policies found.', _NP_TEXT_DOMAIN),
            'not_found_in_trash' => __('No policies found in Trash.', _NP_TEXT_DOMAIN)
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'policy'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => 27,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt')
        );

        register_post_type('policy', $args);
    }
}
//add_action( 'init', 'siglar_policy_init' );