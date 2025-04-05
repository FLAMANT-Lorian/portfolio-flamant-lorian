<?php get_header(); ?>
<h1>Mes projets</h1>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <p>
        <?= get_the_content(); ?>
    </p>
<?php endwhile; endif; ?>

<?php get_footer(); ?>

