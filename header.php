<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <main class="main">
        <header class="header">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid header__container">
                    <span class="navbar-toggler color-gold" data-bs-toggle="collapse" data-bs-target="#menuDropdown"
                        aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-list color-white navbar-icon animate__animated animate__fadeIn"></i>
                    </span>
                    <a href="<?php echo get_site_url() ?>" class="navbar-brand">
                        <?php
                        if (function_exists('the_custom_logo')) {
                            $custom_logo_id = get_theme_mod('theme_logo');
                            $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                            echo '<img src="' . esc_url($logo_url) . '" alt="' . get_bloginfo('name') . '" class="header__logo">';
                            }
                        ?>
                    </a>

                    <div class="collapse navbar-collapse header__navigation animate__animated" id="menuDropdown">
                        <i class="bi bi-x color-gold navbar-icon animate__animated animate__fadeIn close__icon"></i>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary_menu',
                            'menu_class' => 'primary-menu',
                        ));
                        ?>
                    </div>
                    <?php
                    $client_btn = get_theme_mod('clientarea_button_enabled', false);
                    $client_link = get_theme_mod('clientarea_button_link', '#');
                    if ($client_btn) {
                        echo '<a href="' . esc_url($client_link) . '" class="btn btn__main header__button">Client Area</a>';
                        }
                    ?>
                </div>
            </nav>
        </header>