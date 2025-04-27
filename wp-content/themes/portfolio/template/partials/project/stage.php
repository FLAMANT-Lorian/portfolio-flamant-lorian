<section>
    <?php if (have_rows('stage')): while (have_rows('stage')): the_row(); ?>
        <h2><?= get_sub_field('main-title'); ?></h2>
        <p><?= get_sub_field('projects-description', format_value: false); ?></p>
    <?php
    endwhile;
    endif;
    ?>
</section>
