<?php /* Template Name: Page "Contact" */ ?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>

<section class="contact">
    <div class="contact__left"><?= get_the_content(); ?></div>
    <div class="contact__right">
        <?php
        $success = $_SESSION['contact_form_success'] ?? false;
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
    </div>
</section>

<?php get_footer(); ?>
