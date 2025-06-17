<?php
$title = get_sub_field('main-title');
$logos = get_sub_field('languages-logo');
?>

<section class="language" data-showUp="true">
    <h3 class="language--title">
        <?= $title; ?><span class="last__point">.</span>
    </h3>
    <div class="language--wrapper">
        <div class="language--gallery">
            <?php for ($i = 0;
                       $i < 2;
                       $i++): ?>

                <?php foreach ($logos as $logo):?>
                    <div class="language__single">
                        <a href="<?= $logo['caption']; ?>"
                           target="_blank"
                           class="language__single--link"
                        title="Vers la page de <?= $logo['title']; ?>"
                        aria-label="<?= $logo['title']; ?>">
                            <?= responsive_image($logo, ['loading' => 'lazy', 'classes' => 'single__language--image']) ?>
                            <span class="language__single--name"><?= $logo['title']; ?></span>
                        </a>
                    </div>
                <?php endforeach;
            endfor; ?>
        </div>
    </div>
</section>
