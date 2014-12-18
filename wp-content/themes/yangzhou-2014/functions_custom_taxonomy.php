<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/17/14
 * Time: 10:42 AM
 */
if (!function_exists('yangzhou_product_taxonomy_init')) {
    /**
     * Register a event post type.
     *
     * @link http://codex.wordpress.org/Function_Reference/register_post_type
     */
    function yangzhou_product_taxonomy_init()
    {
        $labels = array(
            'name'              => _x( 'Product Categories', 'taxonomy general name' ),
            'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
            'search_items'      => __( 'Search Categories' ),
            'all_items'         => __( 'All Categories' ),
            'parent_item'       => __( 'Parent Category' ),
            'parent_item_colon' => __( 'Parent Category:' ),
            'edit_item'         => __( 'Edit Category' ),
            'update_item'       => __( 'Update Category' ),
            'add_new_item'      => __( 'Add New Category' ),
            'new_item_name'     => __( 'New Category Name' ),
            'menu_name'         => __( 'Product Category' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'category' ),
        );
        register_taxonomy( 'product-category', array( 'product' ), $args );
    }
}
add_action( 'init', 'yangzhou_product_taxonomy_init',0 );