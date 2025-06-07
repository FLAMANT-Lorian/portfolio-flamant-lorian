<section class="project">
    <?php if (have_rows('stage')): while (have_rows('stage')): the_row(); ?>
        <h2 class="project--title" role="heading" aria-level="2">
            <?= get_sub_field('main-title'); ?>
            <span class="last__point">.</span>
        </h2>
        <p class="project--text">
            <?= get_sub_field('projects-description', format_value: false); ?>
        </p>
    <?php
    endwhile;
    endif;
    ?>
</section>
