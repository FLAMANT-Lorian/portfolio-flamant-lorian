<?php
$title = get_sub_field('main-title');
$logos = get_sub_field('languages-logo');
?>

<section class="language" data-showUp="true">
    <h3 class="language--title">
        <?= $title; ?>
        <span class="last__point">.</span>
    </h3>
    <div class="language--wrapper">
        <div class="language--gallery">
            <?php for ($i = 0; $i < 2; $i++): ?>

                <?php foreach ($logos as $logo): ?>
                    <?= responsive_image($logo, ['loading' => 'lazy', 'classes' => 'single__language--image']) ?>
                <?php endforeach; endfor; ?>
        </div>
    </div>
</section>
