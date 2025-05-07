<?php
$title = get_sub_field('main-title');
$school_steps = get_sub_field('school-step');
?>
<section class="school__steps" data-showUp="true">
    <h3 class="school__steps--title">
        <?= $title; ?>
        <span class="last__point">.</span>
    </h3>
    <div class="school__steps__container">

        <?php foreach ($school_steps as $school_step): ?>
            <article class="single__step">
                <time datetime="<?= $school_step['year']; ?>"
                      class="single__step--date">
                    <?= $school_step['year']; ?>
                </time>
                <div class="single__step--info">
                    <h4 class="single__step--title">
                        <?= $school_step['school-name'] ?>
                    </h4>
                    <p class="single__step--orientation">
                        <?= $school_step['orientation'] ?>
                    </p>
                </div>
            </article>
        <?php endforeach; ?>

    </div>
    <div class="slider__btn">
        <div class="btn btn"></div>
        <div class="btn btn--active"></div>
        <div class="btn btn"></div>
    </div>
</section>
