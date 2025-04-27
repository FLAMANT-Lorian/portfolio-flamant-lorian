<?php
$stage = get_field('stage');
?>

<?php if (have_rows('stage')): while (have_rows('stage')):the_row(); ?>
    <section>
        <h2><?= $stage['main-title']; ?></h2>
        <a href="<?= $stage['link']['url']; ?>"><?= $stage['link']['title']; ?></a>
    </section>
<?php
endwhile;
endif;
