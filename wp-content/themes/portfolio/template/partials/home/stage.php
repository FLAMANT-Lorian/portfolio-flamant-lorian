<section class="home__stage">
    <h2 class="home--title">
        <?= get_field('main-title'); ?>
    </h2>
    <div>
        <h3><?= get_field('job-title'); ?></h3>
        <p><?= get_field('job-description'); ?></p>
    </div>
    <?= responsive_image(get_field('profile-picture'), ['loading' => 'lazy', 'classes' => '']); ?>
    <a href="<?= get_field('high-link')['url']; ?>" title="Aller sur la page : À propos">
        <?= get_field('high-link')['title']; ?>
    </a>
</section>
