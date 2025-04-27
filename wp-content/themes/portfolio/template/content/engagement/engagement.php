<?php
$title = get_sub_field('main-title');
$description = get_sub_field('description', format_value: false);
$link = get_sub_field('link');
$engagements = get_sub_field('engagement-card');
?>

<section>
    <div class="left__container">
        <h3><?= $title; ?></h3>
        <p><?= $description; ?></p>
        <a href="<?= $link['url']; ?>"><?= $link['title']; ?></a>
    </div>
    <div class="right__container">
        <?php foreach ($engagements as $engagement): ?>
            <article>
                <h4><?= $engagement['engagement-name']; ?></h4>
                <p><?= $engagement['engagement-description']; ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>
