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
    <section class="filter__container">
        <h3 class="sro">Filtres</h3>
        <a href="<?= esc_url(get_permalink()); ?>"
           class="filter <?= ($current_filter === '') ? 'active' : ''; ?>">
            Tout
        </a>

        <?php foreach ($terms as $term): ?>
            <a href="<?= esc_url(get_permalink()) . '?filter=' . $term->slug; ?>"
               class="filter <?= ($current_filter === $term->slug) ? 'active' : ''; ?>">
                <?= esc_html($term->name); ?>
            </a>
        <?php endforeach; ?>
    </section>
    <section class="projects__archive">
        <h3 class="sro">Mes projets</h3>
        <div class="projects__container">

            <?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post();
                $image = get_field('stage')['card-image'];
                ?>

                <article class="project__card" data-showUp="true">
                    <h3 class="project__card--title">
                        <?= get_the_title(); ?>
                    </h3>
                    <?= responsive_image($image, ['loading' => "eager", 'classes' => 'project__card--image']); ?>
                    <a href="<?= get_the_permalink(); ?>"
                       class="project__card--link"
                       title="Découvrir le projet">
                        <span class="sro">Découvrir le projet :<?= get_the_title(); ?></span>
                    </a>
                </article>

            <?php endwhile; else : ?>
                <p>La page est vide !</p>
            <?php endif; ?>
        </div>
    </section>
    <p class="end__project">
        Revenez bientôt pour découvrir d’autres projets !
    </p>
</section>

<?php get_footer(); ?>
