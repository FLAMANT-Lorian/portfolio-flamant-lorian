<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>

    <a href="<?= get_the_permalink(); ?>"><?= get_the_title(); ?></a>

<?php endwhile; else : ?>
    <p>La page est vide !</p>
<?php endif; ?>
<?php get_footer(); ?>
