<?php
$title = get_sub_field('main-title');
$description = get_sub_field('description', format_value: false);
$link = get_sub_field('link');
$engagements = get_sub_field('engagement-card');
?>

<section class="commitments">
    <div class="info__container">
        <h3 class="commitments--title">
            <?= $title; ?>
            <span class="last__point">.</span>
        </h3>
        <p class="commitments--text">
            <?= $description; ?>
        </p>
        <div class="btn__container">
        <a href="<?= $link['url']; ?>"
           class="arrow__link commitments--link">
            <?= $link['title']; ?>
        </a>
        </div>
    </div>
    <div class="commitments__container">
        <?php foreach ($engagements as $engagement): ?>
            <article class="simple__commitment">
                <h4 class="simple__commitment--title">
                    <?= $engagement['engagement-name']; ?>
                </h4>
                <p class="simple__commitment--text">
                    <?= $engagement['engagement-description']; ?>
                </p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
