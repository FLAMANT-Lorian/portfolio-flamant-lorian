<?php
$image = get_sub_field('image');
$text = get_sub_field('about-me', format_value: false);
$position = get_sub_field('text-position');
$text_visibility = get_sub_field('text_visibility');
?>

<section class="text__media text__media--<?= $position ?>">
    <div class="text__media--info">
        <?php if ($text_visibility === 'yes'): ?>
        <h3 class="text__media--title">
            <?= __trans('Description de moi'); ?>
            <span class="last__point">.</span>
        </h3>
        <?php else: ?>
            <h3 class="sro text__media--title">
                <?= __trans('Description de moi'); ?>
                <span class="last__point">.</span>
            </h3>
        <?php endif; ?>
        <p class="text__media--text">
            <?= $text; ?>
        </p>
    </div>
    <?= responsive_image($image, ['loading' => 'lazy', 'classes' => 'text__media--image']) ?>
</section>