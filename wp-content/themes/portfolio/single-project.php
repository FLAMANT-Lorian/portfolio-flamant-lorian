<?php get_header(); ?>

<?php include('template/partials/single-project/stage.php');

if (have_rows('content')): while (have_rows('content')): the_row();
    if (get_row_layout() === 'text-media-project'):
        include('template/content/text-media/text-media-project.php');
    endif;
endwhile;
endif;
?>

    <section>
        <h2>Découvrir d'autres projets</h2>
        <div>
            <?php
            $projects = new WP_Query([
                'post_type' => 'project',
                'order' => 'DESC',
                'orderby' => 'rand',
                'posts_per_page' => 3,
                'post__not_in' => [$post->ID],
            ]);

            if ($projects->have_posts()): while ($projects->have_posts()): $projects->the_post(); ?>

                <article>
                    <h3><?= get_the_title(); ?></h3>
                    <figure>
                        <img src="" alt="">
                    </figure>
                    <a href="<?= get_the_permalink(); ?>" class="" title="Découvrir le projet">
                        <span class="sro">Découvrir le projet : <?= get_the_title(); ?></span>
                    </a>
                </article>

            <?php endwhile; endif; ?>
        </div>
    </section>

<?php get_footer(); ?>