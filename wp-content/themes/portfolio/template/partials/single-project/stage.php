<section>
    <?php if (have_rows('stage')): while (have_rows('stage')): the_row(); ?>
        <a href="<?= get_sub_field('link')['url']; ?>">
            <?= get_sub_field('link')['title']; ?>
        </a>
        <h2>
            <?= get_sub_field('main-title'); ?>
        </h2>
        <a href="<?= get_sub_field('site-link')['url']; ?>">
            <?= get_sub_field('site-link')['title']; ?>
        </a>
        <p>
            <?= get_sub_field('project-description', format_value: false); ?>
        </p>
    <?php
    endwhile;
    endif;
    ?>
</section>