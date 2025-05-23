<?php

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Include ACF Fields
include_once('fields.php');

// Disable Gutenberg Editor

add_filter('use_block_editor_for_post', '__return_false');
add_filter('use_widgets_block_editor', '__return_false');
add_action('wp_enqueue_scripts', function () {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
}, 20);

add_action('init', 'init_remove_support', 100);

function init_remove_support(): void
{
    remove_post_type_support('post', 'editor');
    remove_post_type_support('page', 'editor');
    remove_post_type_support('product', 'editor');
}

// Register a new taxonomy for filter projects

register_taxonomy('projects', ['project'], [
    'labels' => [
        'name' => 'Types de projet',
        'singular_name' => 'Types de projet'
    ],
    'description' => 'De quel type le projet appartient-il ? ',
    'public' => true,
    'show_tagcloud' => false,
    'hierarchical' => true
]);


// Add Custom Post Type for Projects and contact
add_theme_support('post-thumbnails', ['project']);

register_post_type('project', [
    'label' => 'Projets',
    'description' => 'Les projets que j’ai réalisé',
    'menu_position' => 20,
    'menu_icon' => 'dashicons-portfolio',
    'public' => true,
    'has_archive' => false,
    'rewrite' => [
        'slug' => 'projets',
    ],
]);

register_post_type('contact_message', [
    'label' => 'Messages',
    'description' => 'Messages lié au formulaire de contact',
    'menu_position' => 10, /*Position dans l'admin wordpress => Voir les position sur internet*/
    'menu_icon' => 'dashicons-email',
    'public' => false,
    'has_archive' => false, // Pour faire apparaitre les menus recettes et voyages dans les screen options de WordPress
    'supports' => [
        'title', 'editor',
    ],
    'show_ui' => true,
]);


// Navigation menu
register_nav_menu('header', 'Le menu de navigation principale');
register_nav_menu('footer', 'Le menu de navigation secondaire');

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

    ContactForm::handle($_REQUEST);
}

// Add site option page

function create_site_options_page()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page([
            'page_title' => 'Site Options',
            'menu_title' => 'Site Settings',
            'menu_slug' => 'site-options',
            'capability' => 'edit_posts',
            'redirect' => false
        ]);
    }
}

add_action('acf/init', 'create_site_options_page');

// Add text translation function

function trans_load_textdomain(): void
{
    load_theme_textdomain('trans', get_template_directory() . '/locales');
}

add_action('after_setup_theme', 'trans_load_textdomain');

function __trans(string $translation, array $replacements = [])
{
// 1. Récupérer la traduction de la phrase présente dans $translation
    $base = __($translation, 'trans');

// 2. Remplacer toutes les occurrences des variables par leur valeur
    foreach ($replacements as $key => $value) {
        $variable = ':' . $key;
        $base = str_replace($variable, $value, $base);
    }

// 3. Retourner la traduction complète.
    return $base;
}


// Add automatic SRCSET dunction

function responsive_image($image, array $settings)
{
    $image_id = '';
    if (empty($image)) {
        return '';
    }

    if (is_numeric($image)) {
        $image_id = $image;
    } else if (is_array($image) && isset($image['ID'])) {
        $image_id = $image['ID'];
    } else {
        return '';
        // Générer un tag par défaut
    }

// Récupérer les données de l'image depuis le BD
    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    $image_post = get_post($image_id); // Objet WP Post de l'image
    $title = $image_post->post_title ?? '';
    $name = $image_post->post_name ?? '';

// Récupération des URLs et attributs pour l'image en taille 'full'
    $src = wp_get_attachment_image_url($image_id, 'full');
    $srcset = wp_get_attachment_image_srcset($image_id, 'full');
    $sizes = wp_get_attachment_image_sizes($image_id, 'full');

// Gestion de l'attribut de chargement "lazy" ou "eager" selon les paramètres
    $lazy = $settings['loading'] ?? 'eager';

// Gestion des classes (Si les classes sont fournies dans settings)
    $classes = '';

    if (!empty($settings['classes'])) {
        $classes = is_array($settings['classes']) ? implode(' ', $settings['classes']) : $settings['classes'];
    }

    ob_start(); ?>

    <picture class="picture--container">
        <img src="<?= esc_url($src) ?>"
             alt="<?= esc_attr($alt) ?>"
             loading="<?= esc_attr($lazy) ?>"
             srcset="<?= esc_attr($srcset) ?>"
             sizes="<?= esc_attr($sizes) ?>"
             class="<?= esc_attr($classes); ?>">
    </picture>

    <?php
    return ob_get_clean();
}


// Configuration Vite pour compilation CSS et JS

function enqueue_assets_from_vite_manifest(): void
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        // Vérifier et ajouter le fichier JavaScript
        if (isset($manifest['wp-content/themes/portfolio/resources/js/main.js'])) {
            wp_enqueue_script('portfolio',
                get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/js/main.js']['file']), [], null, true);
        }

        // Vérifier et ajouter le fichier CSS
        if (isset($manifest['wp-content/themes/portfolio/resources/css/style.scss'])) {
            wp_enqueue_style('portfolio',
                get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/css/style.scss']['file']));
        }
    }
}

// 1. Charger un fichier "public" (asset/image/css/script/...) pour le front-end sans que cela ne s'applique à l'admin.
function portfolio_asset(string $file): string
{
    $manifestPath = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifestPath)) {
        $manifest = json_decode(file_get_contents($manifestPath), true);

        if (isset($manifest['wp-content/themes/portfolio/resources/js/main.js']) && $file === 'js') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/js/main.js']['file']);
        }

        if (isset($manifest['wp-content/themes/portfolio/resources/css/style.scss']) && $file === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/resources/css/style.scss']['file']);
        }
    }

    return get_template_directory_uri() . '/public/' . $file;
}

// Allows import of SVG format
function my_own_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'my_own_mime_types');