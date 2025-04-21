<?php /* Template Name: Page "Projets" */ ?>

<?php get_header(); ?>

<?php $project = new WP_Query([
    'post_type' => 'project',
    'order' => 'DESC',
    'orderby' => 'date'
]); ?>

<?php if ($project->have_posts()): while ($project->have_posts()): $project->the_post(); ?>

    <?= get_the_content(); ?>

<?php endwhile; else : ?>
    <p>La page est vide !</p>
<?php endif; ?>

<?php get_footer(); ?>
