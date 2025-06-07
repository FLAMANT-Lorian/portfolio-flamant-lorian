<?= get_header(); ?>

    <section class="not__found">
        <h2 class="not__found--title" role="heading" aria-level="2">
            404
            <span class="last__point">.</span>
        </h2>
        <h3 class="not__found--subtitle" role="heading" aria-level="3">
            <?= __trans('Page non trouvée'); ?>&nbsp;!
        </h3>
        <p class="not__found--text">
            <?= __trans('Il n’y a rien à voir par ici'); ?>&nbsp;!
        </p>
        <div class="not__found__btn__container">
            <a href="<?= home_url(); ?>"
               class="not__found--link"
               title="<?= __trans('Retourner à la page d\'acceuil') ?>"
               aria-label="<?= __trans('Retourner à la page d\'acceuil') ?>">
                <?= __trans('Retourner à l’accueil'); ?>
                <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg" focusable="false">
                    <path d="M12.8137 1.34314C12.8137 1.067 12.5899 0.84314 12.3137 0.84314H7.81371C7.53757 0.84314 7.31371 1.067 7.31371 1.34314C7.31371 1.61928 7.53757 1.84314 7.81371 1.84314H11.8137V5.84314C11.8137 6.11928 12.0376 6.34314 12.3137 6.34314C12.5899 6.34314 12.8137 6.11928 12.8137 5.84314V1.34314ZM1 12.6568L1.35355 13.0104L12.6673 1.69669L12.3137 1.34314L11.9602 0.989586L0.646447 12.3033L1 12.6568Z"/>
                </svg>
            </a>
        </div>
    </section>

<?= get_footer(); ?>