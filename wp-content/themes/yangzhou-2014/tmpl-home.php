<?php
/**
 * Template Name: Home page
 * Author: trac.nguyen (npbtrac@yahoo.com)
 * Date: 11/24/2014
 * Time: 2:35 PM
 *
 * WordPress template file for home page
 */

get_header(); ?>

<div class="section-home">
    <div class="main-slider">
        <div class="container">
            <div class="row">
                <?php   piklist('home/slider'); ?>
            </div>
        </div>
    </div>
    <div class="page-main-content">
        <div class="container">
            <div class="row" >
                <div class="col-md-4 col-xs-4 greeting" >
                    <?php
                    $greetings = get_field('greeting');
                    foreach ($greetings as $key => $greeting):
                    ?>
                    <div class="greeting-title">
                        <?php echo $greeting['greeting_title'];?>
                    </div>
                        <div class="greeting-content">
                            <?php echo $greeting['greeting_content']?>
                        </div>
                    <?php
                    endforeach
                    ?>

                </div>
                <div class="col-md-4 col-xs-4 news-and-update" >
                    <div class="title">
                        <?php echo get_field('new_and_updates_title')?>
                    </div>
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page'    => 2,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    );
                    $the_query = new WP_Query( $args );
                    while ($the_query->have_posts()):
                        $the_query->the_post();
                    ?>
                    <div class="news-content">
                        <div class="heading">
                            <?php  echo get_the_title();?>
                        </div>
                        <div class="content">
                            <?php echo get_the_content();?> <a href="<?php  get_permalink() ?>">Read More</a>
                        </div>

                    </div>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>

                </div>
                <div class="col-md-4 col-xs-4 mail-to-admin">
                    <div class="contact-title">
                        <?php echo get_field('contact_title'); ?>
                    </div>
                    <?php echo do_shortcode('[contact-form-7 id="53" title="MAKE AN ENQUIRY"]'); ?>
                </div>
            </div>
        </div>
        <div class="product-content">
            <?php
            $product_image_id = get_field('product_banner');
            echo wp_get_attachment_image($product_image_id,'large-banner');
            ?>
            <div class="container">
                <div class="product-title">
                    <h4>
                        <?php echo get_field('product_title')?>
                    </h4>
                </div>
                <div class="horizon-line"></div>
                <div class="row">
                    <div class="slider-content">

                    <?php piklist('home/product-slider')?>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-block">
            <div class="container">
                <div class="row">
                    <?php
                    $footer_blocks = get_field('footer_blocks');
                    foreach ($footer_blocks as $key => $footer_block):
                    ?>
                    <div class="col-md-4 col-xs-4 footer-block-content">
                        <div class="block-title">
                            <?php echo $footer_block['title'];?>
                        </div>
                        <div class="block-content">
                            <?php  echo $footer_block['content'];?>
                        </div>
                    </div>
                    <?php
                    endforeach
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>