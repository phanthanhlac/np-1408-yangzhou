<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 */
?>
        </div><!-- /#main-content -->

        <footer class="site-footer" role="contentinfo">
            <div class="container">
                <div class="row">
                    <hr class="hr-footer"/>
                    <div class="copyright-text">
                        <?php
                        $footer_copyright = get_field('footer_copyright', 'option');
                        echo $footer_copyright;
                        ?>
                    </div>
                    <div class="social-icons">
                        <p>Follow Us</p>
                        <?php
                        $social_icons = get_field('social_icons', 'option');
                        !is_array($social_icons) and $social_icons = array();

                        $strResult = '';

                        foreach ($social_icons as $key => $social_icon) {
                            $item_link = strtolower($social_icon['link']);
                            $item_link = !$item_link || substr($item_link, 0, 7) == 'http://' || substr($item_link, 0, 8) == 'https://' ? $item_link : 'http://'.$item_link;

                            if ($item_link) {
                                $strResult .=   '<a href="'.$item_link.'" title>';
                            }
                            $strResult .=   wp_get_attachment_image($social_icon['image'], 'thumbnail');
                            if ($item_link) {
                                $strResult .=   '</a>';
                            }

                        }

                        echo $strResult;
                        ?>

                    </div>

                </div>
            </div>
        </footer>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
