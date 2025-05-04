<?php
$title = get_sub_field('main-title');
$logos = get_sub_field('languages-logo');
?>

<section class="language">
    <h3 class="language--title">
        <?= $title; ?>
        <span class="last__point">.</span>
    </h3>
    <div class="language__gallery">
        <?php foreach ($logos as $logo): ?>
            <?= responsive_image($logo, ['loading' => 'eager', 'classes' => 'single__language--image']) ?>
        <?php endforeach; ?>
    </div>
</section>
