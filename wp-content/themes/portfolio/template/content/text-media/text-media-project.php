<?php
$title = get_sub_field('title');
$paragraphs = get_sub_field('description');
$image = get_sub_field('image');
?>

<section>
    <div>
        <h3>
            <?= $title; ?>
        </h3>
        <?php foreach ($paragraphs as $paragraph): ?>
        <p>
            <?= $paragraph['paragraph']; ?>
        </p>
        <?php endforeach; ?>
    </div>
    <figure>
        <?= responsive_image($image, ['class' => 'image']); ?>
    </figure>
</section>