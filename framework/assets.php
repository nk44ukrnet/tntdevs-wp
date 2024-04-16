<?php

function theme_files()
{
    wp_register_script('main-js', get_theme_file_uri('/js/main.js'), NULL, filemtime(get_template_directory() . '/js/main.min.js'), true);

    wp_register_script('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js', NULL, '1', true);

    wp_register_style('main-styles', get_template_directory_uri() . '/css/all.css', NULL, filemtime(get_template_directory() . '/css/all.min.css'), 'all');

    wp_register_style('swiper-css', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.css', NULL, '1', 'all');

    if(is_front_page()) {
        wp_enqueue_style('swiper-css');
        wp_enqueue_script('swiper-js');
    }

    //enqueue scripts
    wp_enqueue_script('main-js');

    //enqueue styles
    wp_enqueue_style('main-styles');


    wp_localize_script('main-js', 'tntdevsData', array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ));
}

add_action('wp_enqueue_scripts', 'theme_files');
