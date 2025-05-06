<?php /* Template Name: Page "Contact" */ ?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()):
the_post(); ?>
<section class="contact__form">

    <h2 class="contact__form--title">
        <?= get_field('main-title'); ?>
    </h2>
    <div class="contact__form__container">

        <article class="hidden contact__left" data-showUp="true">
            <p class="contact__text">
                <?= get_field('description', format_value: false); ?>
            </p>
        </article>
        <section class="hidden contact__right" data-showUp="true">
            <p class="require__message">
                <?= __trans('Les champs renseignées avec  (*)  sont obligatoires !'); ?>
            </p>
            <?php $success = $_SESSION['contact_form_success'] ?? false;
            unset($_SESSION['contact_form_success']);

            if ($success): ?>
                <div class="contact__success">
                    <p class="success__message"><?= $success; ?></p>
                </div>
            <?php else: ?>
                <?php include('partials/form/form.php'); ?>
            <?php endif;
            endwhile;
            endif; ?>
        </section>
    </div>

</section>

<?php get_footer(); ?>
