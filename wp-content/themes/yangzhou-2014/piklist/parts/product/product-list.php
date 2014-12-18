<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/17/14
 * Time: 4:09 PM
 */
$taxonomies = 'product-category';
$args = array(
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => false,
    'exclude' => array(),
    'exclude_tree' => array(),
    'include' => array(),
    'number' => '',
    'fields' => 'all',
    'slug' => '',
    'parent' => 0,
    'hierarchical' => true,
    'child_of' => 0,
    'get' => '',
    'name__like' => '',
    'description__like' => '',
    'pad_counts' => false,
    'offset' => '',
    'search' => '',
    'cache_domain' => 'core'
);
$terms = get_terms($taxonomies, $args);
function add_Sub_Child($tax, $post,$parent_term){
    $children = get_terms($tax,array('parent' => $parent_term->term_id,'hide_empty' => false,));
    if(!empty( $children ) ) {
        echo '<div id="accordion">';
        foreach ($children as $child){
            echo '<h3 class="sub-cat-title">';
            echo $child->name;
            echo '</h3>';
            echo '<div class="sub-cate sub-cate-'. $child->term_id .'">';

            add_Sub_Child($tax,$post,$child);
            echo '</div>';
        }
    }
    else {
        $args = array(
            'post_type' => 'product',
            'posts_per_page'    => 0,
            'orderby' => 'date',
            'order' => 'DESC',
        );
        $the_query = new WP_Query( $args );
        $strProductsContent = '';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $strProductsContent .= '<div class="product-item">';
            $strProductsContent .=      '<h5 class="">';
            $strProductsContent .=          '<a href="' . get_permalink() . '" title="' . get_the_title() . '">'.  get_the_title()   .'</a>';
            $strProductsContent .=      '</h5>';
            $strProductsContent .= '</div>';
        }
        echo $strProductsContent;
        echo '</div>';
        wp_reset_query();
    }
}
$post_type = 'product';
if (!empty($terms) && !is_wp_error($terms)) {
    foreach ($terms as $term):
        echo '<div class="col-md-4 col-sl-4 product-cate">';
        echo    '<div class="cate-title">';
        echo        '<h4>'.$term->name.'</h4>';
        echo    '</div>';
        echo    '<div class="cate-content">';
        add_Sub_Child($taxonomies,$post_type,$term);
        echo    '</div>';
        echo '</div>';
    endforeach;
}




