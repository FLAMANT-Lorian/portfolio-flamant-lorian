<?php

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Disable Gutenberg Editor

add_filter('use_block_editor_for_post', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');
add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
}, 20);


// Add Custom Post Type for Projects and contact
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

register_post_type('contact_message', [
    'label' => 'Messages',
    'description' => 'Messages lié au formulaire de contact',
    'menu_position' => 10, /*Position dans l'admin wordpress => Voir les position su internet*/
    'menu_icon' => 'dashicons-email',
    'public' => false,
    'has_archive' => false, // Pour faire apparaitre les menus recettes et voyages dans les screen options de WordPress
    'supports' => [
        'title', 'editor',
    ],
    'show_ui' => true,
]);


// Navigation menu
register_nav_menu('header', 'Le menu de navigation principale - FR');
register_nav_menu('footer', 'Le menu de navigation secondaire - FR');

function dw_get_navigation_links(string $location): array
{
    // 1°  Récupérer l'objet WordPress pour le menu à la location $location
    $locations = get_nav_menu_locations();

    if (!isset($locations[$location])) {
        return [];
    }

    $nav_id = $locations[$location];
    $nav = wp_get_nav_menu_items($nav_id);

    // 2°  Transformer le menu en 1 tableau de lien , chaque lien étant un obet personnalisable
    $links = [];
    foreach ($nav as $post) {
        $link = new stdClass(); // Créer un objet vide en PHP
        $link->href = $post->url;
        $link->label = $post->title;
        $link->icon = get_field('icon', $post);

        $links[] = $link; // Version raccourci pour pousser des élémnts dans un tableaux
    }
    return $links;
    // 3°  Retourner ce tableau d'objet (liens)
}

// remove useless scripts and admin bar in UI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_print_comments');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_generator');

add_filter('show_admin_bar', '__return_false');


// Handling contact form
use Portfolio\Forms\ContactForm;
require __DIR__ . '/forms/ContactForm.php';

add_action('admin_post_nopriv_dw_submit_contact_form', 'handle_contact_form'); // On est connecter
add_action('admin_post_dw_submit_contact_form', 'handle_contact_form'); // On est pas connecter

function handle_contact_form()
{
    ContactForm::check([
        'last_name' => 'required',
        'first_name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
    ]);

    return ContactForm::handle($_REQUEST);
}