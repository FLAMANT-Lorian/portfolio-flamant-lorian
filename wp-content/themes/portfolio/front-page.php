<?php get_header();
if (have_posts()): while (have_posts()): the_post();
    $stage = get_field('stage');
    $content = get_field('content');
    ?>

    <section>
        <h2><?= $stage['main-title']; ?></h2>
        <div>
            <h3><?= $stage['job-title']; ?></h3>
            <p><?= $stage['job-description']; ?></p>
        </div>
        <figure>
            <img src="" alt="">
        </figure>
        <a href="<?= $stage['high-link']['url']; ?>"><?= $stage['high-link']['title']; ?></a>
    </section>


<?php endwhile; endif;

get_footer();
