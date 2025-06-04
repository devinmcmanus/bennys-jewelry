<?php
function dt_enqueue_styles() {
    $parenthandle = 'divi-style'; 
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(), // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') 
    );
}
add_action( 'wp_enqueue_scripts', 'dt_enqueue_styles' );

function childtheme_enqueue_great_vibes() {
    // Load Great Vibes from Google Fonts
    wp_enqueue_style(
        'great-vibes-googlefont',
        'https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'childtheme_enqueue_great_vibes');