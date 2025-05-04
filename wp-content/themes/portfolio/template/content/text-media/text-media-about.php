<?php
$image = get_sub_field('image');
$text = get_sub_field('about-me', format_value: false);
$position = get_sub_field('text-position');
?>

<section class="text__media text__media--<?= $position ?>">
    <div class="text__media--info">
        <h3 class="sro text__media--title">
            <?= __trans('Description de moi'); ?>
            <span class="last__point">.</span>
        </h3>
        <p class="text__media--text">
            <?= $text; ?>
        </p>
    </div>
    <?= responsive_image($image, ['loading' => 'eager', 'classes' => 'text__media--image']) ?>
</section>