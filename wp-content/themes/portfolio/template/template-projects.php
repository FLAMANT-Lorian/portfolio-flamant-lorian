<?php /* Template Name: Page "Projets" */ ?>

<?php get_header(); ?>

<?php include('partials/project/stage.php'); ?>

<section>
    <h2 class="sro">L'ensemble de mes projets</h2>
    <?php
    $taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';
    $args = [
        'post_type' => 'project',
        'posts_per_page' => 6,
    ];

    if ($taxonomy !== '') {
        $args['tax_query'] = [
            [
                'taxonomy' => 'projects',
                'field' => 'slug',
                'terms' => $taxonomy,
            ]
        ];
    }
    $query = new WP_Query($args);

    $current_lang = pll_current_language();
    $terms = get_terms([
        'taxonomy' => 'projects',
        'hide_empty' => false,
        'lang' => $current_lang,
    ]);

    $current_filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';
    ?>

    <div class="">
        <div class="">
            <a href="<?= esc_url(get_permalink()); ?>" class="<?= ($current_filter === '') ? 'active-project' : ''; ?>">
                Tout
            </a>

            <?php foreach ($terms as $term): ?>
                <a href="<?= esc_url(get_permalink()) . '?filter=' . $term->slug; ?>"
                   class="<?= ($current_filter === $term->slug) ? 'active-project' : ''; ?>">
                    <?= esc_html($term->name); ?>
                </a>
            <?php endforeach; ?>
        </div>
        <?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post(); ?>

            <article>
                <h3><?= get_field('stage')['main-title']; ?></h3>
                <figure>
                    <img src="" alt="">
                </figure>
                <a href="<?= get_the_permalink(); ?>" class="" title="Découvrir le projet">
                    <span class="sro">Découvrir le projet :<?= get_the_title(); ?></span>
                </a>
            </article>

        <?php endwhile; else : ?>
            <p>La page est vide !</p>
        <?php endif; ?>
</section>

<?php get_footer(); ?>
