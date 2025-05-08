<?php get_header(); ?>

<?php include('template/partials/single-project/stage.php');
if (have_rows('content')): while (have_rows('content')): the_row();
    if (get_row_layout() === 'text-media-project'):
        include('template/content/text-media/text-media-project.php');
    endif;
endwhile;
endif;
?>

    <section class="others__projects">
        <h2 class="others__projects--title">
            <?= __trans('Découvrir d’autres projets'); ?>
            <span class="last__point">.</span>
        </h2>
        <div class="projects__container">
            <?php $projects = new WP_Query([
                'post_type' => 'project',
                'order' => 'DESC',
                'orderby' => 'rand',
                'posts_per_page' => 2,
                'post__not_in' => [$post->ID],
            ]);

            if ($projects->have_posts()): while ($projects->have_posts()): $projects->the_post();
                $image = get_field('stage')['card-image'];
                ?>

                <article class="project__card">
                    <h3 class="project__card--title">
                        <?= get_the_title(); ?>
                    </h3>
                    <?= responsive_image($image, ['loading' => 'eager', 'classes' => 'project__card--image']) ?>
                    <a href="<?= get_the_permalink(); ?>"
                       class="project__card--link"
                       title="<?= __trans('Découvrir le projet'); ?>&nbsp;: <?= get_the_title(); ?>">
                        <span class="sro"><?= __trans('Découvrir le projet'); ?>&nbsp;: <?= get_the_title(); ?></span>
                    </a>
                </article>
            <?php endwhile; endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>

<?php get_footer(); ?>