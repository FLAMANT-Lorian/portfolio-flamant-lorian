<?php /* Template Name: Page "Projets" */ ?>

<?php get_header(); ?>

<?php include('partials/project/stage.php'); ?>

<section>
    <h2 class="sro"><?= __trans('L’ensemble de mes projets'); ?></h2>
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
        <h3 class="sro"><?= __trans('Filtres'); ?></h3>
        <a href="<?= esc_url(get_permalink()); ?>"
           class="filter <?= ($current_filter === '') ? 'active' : ''; ?>">
            <?= __trans('Tout') ?>
        </a>

        <?php foreach ($terms as $term): ?>
            <a href="<?= esc_url(get_permalink()) . '?filter=' . $term->slug; ?>"
               class="filter <?= ($current_filter === $term->slug) ? 'active' : ''; ?>">
                <?= esc_html($term->name); ?>
            </a>
        <?php endforeach; ?>
    </section>
    <section class="projects__archive" itemprop="knowsAbout" itemscope="" itemtype="https://schema.org/CreativeWork">
        <h3 class="sro"><?= __trans('Mes projets'); ?></h3>
        <div class="projects__container">

            <?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post();
                $image = get_field('stage')['card-image'];
                ?>

                <article class="project__card" data-showUp="true">
                    <h3 class="project__card--title" itemprop="workExample">
                        <?= get_the_title(); ?>
                    </h3>
                    <?= responsive_image($image, ['loading' => "eager", 'classes' => 'project__card--image']); ?>
                    <a href="<?= get_the_permalink(); ?>"
                       class="project__card--link"
                       title="<?= __trans('Découvrir le projet '); ?>&nbsp;: <?= get_the_title(); ?>">
                        <span class="sro"><?= __trans('Découvrir le projet '); ?>&nbsp;: <?= get_the_title(); ?></span>
                    </a>
                </article>

            <?php endwhile; endif; ?>
        </div>
    </section>
    <p class="end__project">
        <?= __trans('Revenez bientôt pour découvrir d’autres projets'); ?>&nbsp;!
    </p>
</section>

<?php get_footer(); ?>
