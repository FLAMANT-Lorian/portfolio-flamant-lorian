<?php
$stage = get_field('stage');
?>

<?php if (have_rows('stage')): while (have_rows('stage')):the_row(); ?>
    <section class="about">
        <h2 class="about--title">
            <?= $stage['main-title']; ?><span class="last__point">.</span>
        </h2>
        <div class="btn__container">
            <a href="<?= $stage['link']['url']; ?>"
               class="arrow__link about--link"
               title="<?= __trans('Aller vers la page : Projets'); ?>"
               aria-label="<?= __trans('Découvrir mes projets'); ?>">
                <?= $stage['link']['title']; ?>
            </a>
        </div>
    </section>
<?php
endwhile;
endif;
