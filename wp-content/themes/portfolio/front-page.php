<?php get_header();
if (have_posts()): while (have_posts()): the_post(); ?>

    <?php include('template/partials/home/stage.php'); ?>

    <section class="recent__project" itemprop="knowsAbout" itemscope="" itemtype="https://schema.org/CreativeWork">
        <h2 class="sro"><?= __trans('Mes derniers projets'); ?></h2>
        <div class="projects__container">
            <?php $projects = new WP_Query([
                'post_type' => 'project',
                'order' => 'DESC',
                'orderby' => 'date',
                'posts_per_page' => 2,
            ]);

            if ($projects->have_posts()): while ($projects->have_posts()): $projects->the_post();
                $image = get_field('stage')['card-image'];
                ?>

                <article class="project__card" data-showUp="true">
                    <h3 class="project__card--title" itemprop="workExample">
                        <?= get_the_title(); ?>
                    </h3>
                    <?= responsive_image($image, ['loading' => 'eager', 'classes' => 'project__card--image']) ?>
                    <a href="<?= get_the_permalink(); ?>"
                       class="project__card--link"
                       title="<?= __trans('Découvrir le projet '); ?>&nbsp;: <?= get_the_title(); ?>"
                       aria-label="<?= __trans('Découvrir le projet '); ?>&nbsp;: <?= get_the_title(); ?>">
                        <span class="sro"><?= __trans('Découvrir le projet'); ?>&nbsp;: <?= get_the_title(); ?></span>
                    </a>
                </article>

            <?php endwhile; endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <div class="btn__container">
            <a href="<?= get_field('low-link')['url']; ?>"
               title="<?= __trans('Aller sur la page : Mes projets'); ?>"
               aria-label="<?= __trans('Découvrir mes projets'); ?>"
               class="home--sublink arrow__link">
                <?= get_field('low-link')['title']; ?>
            </a>
        </div>
    </section>

<?php endwhile; endif;
get_footer();