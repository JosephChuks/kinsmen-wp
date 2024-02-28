<?php get_header(); ?>
<div class="page"
    style="background-image: linear-gradient(rgba(2, 8, 21, 0.9), rgba(2, 8, 21, 0.8)), url(<?php echo esc_url(get_theme_mod('background_image_setting', get_template_directory_uri() . '/assets/img/banner1.jpg')); ?>)">
</div>
<section class="section p-4">
    <div class="article__content">
        <?php
        if (have_posts()) :
            while (have_posts()) :
                the_post();
                ?>
                <a href="<?php the_permalink(); ?>" class="article" id="post-<?php the_ID(); ?>">
                    <div class="article__img">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri() ?>/screenshot.png" alt="<?php the_title(); ?>"
                                class="section__card-img">
                        <?php endif; ?>
                    </div>
                    <div class="article__contents">
                        <h3 class="fw-bold mb-4 color-gold article__title"><?php the_title(); ?></h3>
                        <div class="article__excerpt text-white"><?php the_excerpt(); ?></div>
                    </div>
                </a>

                <?php
            endwhile;
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('&larr; Previous', 'gcinigeria-wp'),
                'next_text' => __('Next &rarr;', 'gcinigeria-wp'),
            ));

        else : ?>
            <div class="not-found">
                <p class="not-found__text">Sorry, no posts were found!</p>
            </div>
            <?php
        endif;
        ?>
    </div>
</section>
<?php get_footer(); ?>