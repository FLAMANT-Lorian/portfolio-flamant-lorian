<?php /* Template Name: Page "legal" */ ?>

<?= get_header(); ?>

    <section class="privacy">
        <h2 class="privacy--title">
            <?= __trans('Mentions légales'); ?><span class="last__point">.</span>
        </h2>
        <p class="privacy--date">
            <time datetime="<?= get_the_modified_date('d-m-Y'); ?>">
                <?= __trans('Mis à jour le'); ?> <?= get_the_modified_date('d-m-Y'); ?>.
            </time>
        </p>
    </section>
    <section class="privacy__container">
        <h2 class="sro"><?= __trans('Contenu'); ?></h2>
        <?= get_field('legal', format_value: false); ?>
    </section>

<?= get_footer(); ?>