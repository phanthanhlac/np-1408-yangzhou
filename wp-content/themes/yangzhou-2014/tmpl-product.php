<?php
/**
 * Template Name: Product Page
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/17/14
 * Time: 9:01 AM
 */
?>
<?php get_header(); ?>
<div class="section-product">
    <div class="product-banner">
        <?php
        $main_banner_id = get_field('main_banner');
        echo wp_get_attachment_image($main_banner_id,'large-banner');
        ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="product-title">
                <?php echo get_field('product_title');?>
            </div>
            <div class="product-horizon-line"></div>
            <div class="product-intro">
                <?php echo get_field('product_intro');?>
            </div>
            <div class="product-cotainer">
                <?php piklist('product/product-list');?>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>