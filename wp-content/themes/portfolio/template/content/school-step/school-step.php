<?php
$title = get_sub_field('main-title');
$school_steps = get_sub_field('school-step');
?>
<section>
    <h3><?= $title; ?></h3>
    <?php foreach ($school_steps as $school_step): ?>
        <article>
            <div class="school__date">
                <time datetime="<?= $school_step['year']; ?>"><?= $school_step['year']; ?></time>
            </div>
            <div class="school__information">
                <h4><?= $school_step['school-name'] ?></h4>
                <p><?= $school_step['orientation'] ?></p>
            </div>
        </article>
    <?php endforeach; ?>
</section>
