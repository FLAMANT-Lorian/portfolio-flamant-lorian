<?php
$image = get_sub_field('image');
$text = get_sub_field('about-me', format_value: false);
$position = get_sub_field('text-position');
?>

<section class="text__media__about text__media__about--<?= $position ?>" data-showUp="true">
    <div class="text__media__about--info">
        <h3 class="sro text__media__about--title" role="heading" aria-level="3">
            <?= __trans('Description de moi'); ?>
            <span class="last__point">.</span>
        </h3>
        <p class="text__media__about--text" itemprop="description">
            <?= $text; ?>
        </p>
    </div>
    <?= responsive_image($image, ['loading' => 'eager', 'classes' => 'text__media__about--image']) ?>
</section>