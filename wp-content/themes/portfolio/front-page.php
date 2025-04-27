<?php get_header();
if (have_posts()): while (have_posts()): the_post(); ?>

    <?php include('template/partials/home/stage.php'); ?>

    <section>
        <h2 class="sro">Mes derniers projets</h2>
        <?php $projects = new WP_Query([
            'post_type' => 'project',
            'order' => 'DESC',
            'orderby' => 'date',
            'posts_per_page' => 2,
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

        <?php endwhile; else: ?>
            <p>Il n'y a aucun projets à voir pour le moment</p>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
        <a href="<?= get_field('low-link')['url']; ?>" title="Aller sur la page : Mes projets">
            <?= get_field('low-link')['title']; ?>
        </a>
    </section>

<?php endwhile; endif;
get_footer();