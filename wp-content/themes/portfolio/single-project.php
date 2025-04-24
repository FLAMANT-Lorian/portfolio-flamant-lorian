<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

    <h1><?= get_the_content(); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>

