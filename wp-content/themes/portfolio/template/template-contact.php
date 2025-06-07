<?php /* Template Name: Page "Contact" */ ?>

<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()):
the_post(); ?>
<section class="contact__form">

    <h2 class="contact__form--title" role="heading" aria-level="2">
        <?= get_field('main-title'); ?>
        <span class="last__point">.</span>
    </h2>
    <div class="contact__form__container">

        <article class="contact__left">
            <h3 class="sro" role="heading" aria-level="3">
                Informations de contact
            </h3>
            <p class="contact__text">
                <?= get_field('description', format_value: false); ?>
            </p>
        </article>
        <section class="contact__right">
            <h3 class="sro" role="heading" aria-level="3">
                Formulaire de contact
            </h3>
            <p class="require__message">
                <?= __trans('Les champs renseignés avec  (*)  sont obligatoires !'); ?>
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
