<section class="single__stage">
    <?php if (have_rows('stage')): while (have_rows('stage')): the_row(); ?>
        <div class="btn__container">
            <a href="<?= get_sub_field('link')['url']; ?>"
               class="arrow__link single__stage--highlink">
                <?= get_sub_field('link')['title']; ?>
            </a>
        </div>
        <h2 class="single__stage--title">
            <?= get_sub_field('main-title'); ?>
        </h2>
        <div class="btn__container">
            <a href="<?= get_sub_field('site-link')['url']; ?>"
               class="arrow__link single__stage--sublink">
                <?= get_sub_field('site-link')['title']; ?>
            </a>
        </div>
    <?php
    endwhile;
    endif;
    ?>
</section>