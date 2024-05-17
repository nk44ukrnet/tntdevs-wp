<?php
function current_theme_setup(){
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'adw' ),
            'menu-2' => esc_html__( 'Footer menu 1', 'adw' ),
        )
    );

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}
add_action( 'after_setup_theme', 'current_theme_setup' );

//acf
require_once('framework/acf.php');

//assets
require_once('framework/assets.php');

//shortcodes
require_once('framework/shortcodes.php');

//other custom code
require_once('framework/other.php');

