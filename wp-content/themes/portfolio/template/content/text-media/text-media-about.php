<?php
$image = get_sub_field('image');
$text = get_sub_field('about-me', format_value: false);
$position = get_sub_field('position');
?>

<section>
    <h3><?= __trans('Description de moi'); ?></h3>
    <div class="<?= $position ?>">
        <p>
            <?= $text; ?>
        </p>
    </div>
    <?= responsive_image($image, []) ?>
</section>