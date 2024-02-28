<?php
//Logo
function theme_customizer_settings($wp_customize)
    {
    // Logo Section
    $wp_customize->add_section('theme_logo_section', array(
        'title' => esc_html__('Main Logo', 'kinsmen-wp'),
        'priority' => 20,
    ));

    $wp_customize->add_setting('theme_logo', array(
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'theme_logo', array(
        'label' => esc_html__('Upload Main Logo', 'kinsmen-wp'),
        'section' => 'theme_logo_section',
        'settings' => 'theme_logo',
        'flex_width' => true,
        'flex_height' => true,
    )));


    // Footer Logo Section
    $wp_customize->add_section('footer_logo_section', array(
        'title' => esc_html__('Footer Logo', 'kinsmen-wp'),
        'priority' => 21,
    ));

    $wp_customize->add_setting('footer_logo', array(
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, 'footer_logo', array(
        'label' => esc_html__('Upload Footer Logo', 'kinsmen-wp'),
        'section' => 'footer_logo_section',
        'settings' => 'footer_logo',
        'flex_width' => true,
        'flex_height' => true,
    )));


    // Donate Button
    $wp_customize->add_section('clientarea_button_section', array(
        'title' => __('Client Area Button', 'kinsmen-wp'),
        'priority' => 22,
    ));
    $wp_customize->add_setting('clientarea_button_enabled', array(
        'default' => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ));
    $wp_customize->add_control('clientarea_button_enabled', array(
        'type' => 'checkbox',
        'label' => __('Enable Client Area Button', 'kinsmen-wp'),
        'section' => 'clientarea_button_section',
    ));
    $wp_customize->add_setting('clientarea_button_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('clientarea_button_link', array(
        'type' => 'text',
        'label' => __('Client Area Button Link', 'kinsmen-wp'),
        'section' => 'clientarea_button_section',
    ));



    // Add section for the content header background image
    $wp_customize->add_section('background_image_section', array(
        'title' => __('Content Header', 'kinsmen-wp'),
        'priority' => 23,
    ));
    $wp_customize->add_setting('background_image_setting', array(
        'default' => get_template_directory_uri() . '/assets/img/banner1.jpg',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'background_image_control', array(
        'label' => __('Upload Content Header', 'kinsmen-wp'),
        'section' => 'background_image_section',
        'settings' => 'background_image_setting',
    )));



    // Section for root colors
    $wp_customize->add_section('theme_colors', array(
        'title' => __('Theme Colors', 'kinsmen-wp'),
        'priority' => 25,
    ));

    $wp_customize->add_setting('color_primary', array(
        'default' => '#020815',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_primary', array(
        'label' => __('Primary Color', 'kinsmen-wp'),
        'section' => 'theme_colors',
    )));


    $wp_customize->add_setting('color_secondary', array(
        'default' => '#f48513',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_secondary', array(
        'label' => __('Secondary Color', 'kinsmen-wp'),
        'section' => 'theme_colors',
    )));


    $wp_customize->add_setting('color_tertiary', array(
        'default' => '#7e4ef3',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_tertiary', array(
        'label' => __('Tertiary Color', 'kinsmen-wp'),
        'section' => 'theme_colors',
    )));

    $wp_customize->add_setting('color_gradient', array(
        'default' => '#200224cf',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'color_gradient', array(
        'label' => __('Gradient Color', 'kinsmen-wp'),
        'section' => 'theme_colors',
    )));


    }

add_action('customize_register', 'theme_customizer_settings');


function custom_theme_customizer_styles()
    {
    $color_primary = get_theme_mod('color_primary', '#020815');
    $color_secondary = get_theme_mod('color_secondary', '#f48513');
    $color_tertiary = get_theme_mod('color_tertiary', '#7e4ef3');
    $color_gradient = get_theme_mod('color_gradient', '#200224cf');


    ?>
    <style type="text/css">
        :root {
            --primary-color:
                <?php echo $color_primary; ?>
            ;
            --secondary-color:
                <?php echo $color_secondary; ?>
            ;
            --tertiary-color:
                <?php echo $color_tertiary; ?>
            ;
            --gradient-color:
                <?php echo $color_gradient; ?>
            ;

        }
    </style>
    <?php
    }
add_action('wp_head', 'custom_theme_customizer_styles');