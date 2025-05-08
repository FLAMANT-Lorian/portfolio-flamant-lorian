<section class="home">
    <h2 class="home--title">
        <?= get_field('main-title'); ?>
        <span class="last__point">.</span>
    </h2>
    <div class="home--information">
        <h3>
            <?= get_field('job-title'); ?>
            <span class="last__point">.</span>
        </h3>
        <p>
            <?= get_field('job-description', format_value: false); ?>
        </p>
    </div>
    <?= responsive_image(get_field('profile-picture'), ['loading' => 'eager', 'classes' => 'home--picture']); ?>
    <div class="btn__container">
        <a href="<?= get_field('high-link')['url']; ?>"
           title="<?= __trans('Aller sur la page : À propos');?>"
           class="home--link arrow__link">
            <?= get_field('high-link')['title']; ?>
        </a>
    </div>
</section>
