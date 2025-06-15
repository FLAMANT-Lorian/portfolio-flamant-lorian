<?php
$title = get_sub_field('main-title');
$description = get_sub_field('description', format_value: false);
$link = get_sub_field('link');
$engagements = get_sub_field('engagement-card');
?>

<section class="commitments" data-showUp="true">
    <div class="info__container">
        <h3 class="commitments--title">
            <?= $title; ?><span class="last__point">.</span>
        </h3>
        <p class="commitments--text">
            <?= $description; ?>
        </p>
        <div class="btn__container">
            <a href="<?= $link['url']; ?>"
               class="arrow__link commitments--link"
               title="<?= __trans('Aller vers la page : Contact'); ?>"
               aria-label="<?= __trans('Me contacter'); ?>">
                <?= $link['title']; ?>
            </a>
        </div>
    </div>
    <div class="commitments__container" itemscope itemtype="https://schema.org/CreativeWork">
        <?php if (have_rows('engagement-card')): ?>
            <?php while (have_rows('engagement-card')): the_row(); ?>
                <article class="simple__commitment">
                    <h4 class="simple__commitment--title" itemprop="about">
                        <?= get_sub_field('engagement-name'); ?>
                    </h4>
                    <p class="simple__commitment--text" itemprop="abstract">
                        <?= get_sub_field('engagement-description', format_value: false); ?>
                    </p>
                </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
