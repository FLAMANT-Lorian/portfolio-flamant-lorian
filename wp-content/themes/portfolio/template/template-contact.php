<?php /* Template Name: Page "Contact" */ ?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()):
the_post(); ?>

    <h2><?= get_field('main-title'); ?></h2>
<div class="contact">

    <article class="contact__left">
        <p>
            <?= get_field('description', format_value: false); ?>
        </p>
    </article>

    <section class="contact__right">
        <?php $success = $_SESSION['contact_form_success'] ?? false;
        unset($_SESSION['contact_form_success']);

        if ($success): ?>
            <div class="contact__success">
                <p><?= $success; ?></p>
            </div>
        <?php else: ?>
            <?php include('partials/form/form.php'); ?>
        <?php endif;
        endwhile;
        endif; ?>
    </section>

</div>

<?php get_footer(); ?>
