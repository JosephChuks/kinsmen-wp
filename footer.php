</main>
<footer class="footer">
    <div class="footer__content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 mb-4">
                    <a href="<?php echo get_site_url() ?>" class="footer__logo-link">
                        <?php
                        if (function_exists('the_custom_logo')) {
                            $custom_logo_id = get_theme_mod('footer_logo');
                            $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                            echo '<img src="' . esc_url($logo_url) . '" alt="' . get_bloginfo('name') . '" class="footer__logo">';
                            }
                        ?>
                    </a>
                    <div class="footer__description color-white pt-md">
                        <?php dynamic_sidebar('footer_one'); ?>
                    </div>
                </div>

                <div class="col-6 col-lg-3">
                    <div class="footer__card">
                        <?php dynamic_sidebar('footer_two_up'); ?>
                    </div>
                    <div class="footer__card">
                        <?php dynamic_sidebar('footer_two_down'); ?>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="footer__card">
                        <?php dynamic_sidebar('footer_three_up'); ?>
                    </div>
                    <div class="footer__card">
                        <?php dynamic_sidebar('footer_three_down'); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="footer__copyright">
        <div class="footer__attribution"><span class="color-gold">&copy; <span id="year"></span> <?= get_bloginfo() ?>
            </span><span class="text-secondary">All rights reserved</span></div>
        <div class="footer__credit"><a href="https://thekinsmen.net" target="_blank" class="footer__credit-link">Made
                with </a> &nbsp;<i class="bi bi-heart color-gold"></i> </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>