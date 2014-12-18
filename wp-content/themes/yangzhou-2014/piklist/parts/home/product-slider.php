<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/14/14
 * Time: 11:00 PM
 */
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
    $strProductsContent .= '<div class="col-md-3 col-xs-3 product-item">';
    if ( has_post_thumbnail() ) {
        $strProductsContent .=  '<div class="image">';
        $strProductsContent .=      get_the_post_thumbnail();
        $strProductsContent .=  '</div>';
    }
    $strProductsContent .=      '<h4 class="entry-title">';
    $strProductsContent .=          '<a href="' . get_permalink() . '" title="' . get_the_title() . '">'.  get_the_title()   .'</a>';
    $strProductsContent .=      '</h4>';
    $strProductsContent .= '</div>';
}
if ($strProductsContent) $strProductsContent = '<div class="product-slider">'.$strProductsContent .'</div>';
echo $strProductsContent;
wp_reset_query();