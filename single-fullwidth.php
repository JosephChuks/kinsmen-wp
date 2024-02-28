<?php
/*
Template Name: Default Fullwidth
*/
?>

<?php get_header(); ?>
<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>
        <?php the_content(); ?>
    <?php
    endwhile;
else : ?>
    <div class="not-found">
        <p class="not-found__text">Sorry, no post found!</p>
    </div>
    <?php
endif;
?>

<?php get_footer(); ?>