<?php
add_theme_support('menus');

function theme_register_menus()
    {
    register_nav_menus(
        array(
            'primary_menu' => esc_html__('Primary Menu', 'kinsmen-wp')
        )
    );
    }
add_action('init', 'theme_register_menus');


function custom_theme_customize_js()
    {
    wp_enqueue_script('theme-customizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array('customize-preview'), '', true);
    }
add_action('customize_preview_init', 'custom_theme_customize_js');

function enqueue_assets()
    {
    // Enqueue Stylesheets
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', array(), '1.0', 'all');
    wp_enqueue_style('custom-stylesheet', get_stylesheet_directory_uri() . '/assets/css/custom.css', array(), '1.0', 'all');
    wp_enqueue_style('main-stylesheet', get_stylesheet_directory_uri() . '/assets/css/styles.css', array(), '1.0', 'all');

    // Enqueue Scripts
    wp_enqueue_script('bootsrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
    }

add_action('wp_enqueue_scripts', 'enqueue_assets');


function theme_setup()
    {
    add_theme_support('post-thumbnails');
    }
add_action('after_setup_theme', 'theme_setup');

function custom_wp_title($title)
    {
    if (is_home() || is_front_page()) {
        $title = get_bloginfo('name') . ' | ' . get_bloginfo('description');
        }
    elseif (is_singular()) {
        $title = single_post_title('', false) . ' | ' . get_bloginfo('name');
        }
    elseif (is_category() || is_tag() || is_tax()) {
        $title = single_term_title('', false) . ' | ' . get_bloginfo('name');
        }
    else {
        $title = get_the_title() . ' | ' . get_bloginfo('name');
        }
    return $title;
    }
add_filter('wp_title', 'custom_wp_title', 10, 1);







function custom_document_title_parts($title_parts)
    {
    if (is_home() || is_front_page()) {
        $title_parts['title'] = get_bloginfo('name') . ' | ' . get_bloginfo('description');
        }
    elseif (is_singular()) {
        $title_parts['title'] = single_post_title('', false) . ' | ' . get_bloginfo('name');
        }
    elseif (is_category() || is_tag() || is_tax()) {
        $title_parts['title'] = single_term_title('', false) . ' | ' . get_bloginfo('name');
        }
    else {
        $title_parts['title'] = get_the_title() . ' | ' . get_bloginfo('name');
        }

    return $title_parts;
    }
add_filter('document_title_parts', 'custom_document_title_parts', 10, 1);


function add_thumbnail_class($content)
    {
    $content = preg_replace('/<img(.*?)class=[\'"](.*?)[\'"](.*?)>/i', '<img$1class="$2 section__card-img"$3>', $content);

    return $content;
    }

add_filter('post_thumbnail_html', 'add_thumbnail_class');



include_once get_template_directory() . '/includes/customizer.php';
include_once get_template_directory() . '/includes/widgets.php';





