<?php

// Disable Gutenberg Editor
add_filter('use_block_editor_for_post', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');
add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
}, 20);



// Add Custom Post Type for Projects
add_theme_support('post-thumbnails', ['project']);

register_post_type('project', [
    'label' => 'Projets',
    'description' => 'Les projets que j’ai réalisé',
    'menu_position' => 20,
    'menu_icon' => 'dashicons-portfolio',
    'public' => true,
    'has_archive' => true,
    'rewrite' => [
        'slug' => 'projets',
    ],
    'supports' => [
        'title', 'editor', 'excerpt', 'thumbnail',
    ],
]);