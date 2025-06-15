<?php
$title = get_sub_field('title');
$image = get_sub_field('image');
$text_position = get_sub_field('text-position');
?>

<section class="hidden text__media__project text__media__project--<?= $text_position; ?>" data-showUp="true">
    <div class="text__media__project--information">
        <h3 class="text__media__project--title">
            <?= $title; ?><span class="last__point">.</span>
        </h3>
        <?php if (have_rows('description')): while (have_rows('description')): the_row(); ?>
            <p class="text__media__project--paragraph">
                <?= get_sub_field('paragraph', false); ?>
            </p>
        <?php endwhile; endif; ?>
    </div>
    <?= responsive_image($image, ['loading' => 'eager', 'classes' => 'text__media__project--image']); ?>
</section>