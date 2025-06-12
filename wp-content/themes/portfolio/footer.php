</main>
<footer class="footer">
    <div class="footer__container">
        <h2 class="sro">Footer</h2>
        <nav class="footer__nav secondary__nav" aria-label="secondary">
            <h3 class="footer__nav--title secondary__nav--title">
                <?= __trans('Navigation'); ?>
            </h3>
            <ul class="footer__nav--list secondary__nav--list">
                <?php foreach (dw_get_navigation_links('footer') as $link): ?>
                    <li class="secondary__nav--item">
                        <a href="<?= $link->href; ?>" class="nav__link"
                           title="<?= __trans('Aller sur la page : ') ?><?= $link->label ?>"
                           aria-label="<?= __trans('Aller sur la page : ') ?><?= $link->label ?>">
                            <?= $link->label; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <aside class="footer__nav social__link">
            <h3 class="footer__nav--title">
                <?= __trans('Retrouvez-moi'); ?>
            </h3>
            <ul class="footer__nav--list">
                <?php if (have_rows('social-networks', 'option')):
                    while (have_rows('social-networks', 'option')):
                        the_row();
                        $social_network_type = get_sub_field('social-network-type');
                        $social_network_link = get_sub_field('social-network-link');
                        ?>

                        <li class="footer__nav--item social__network--<?= $social_network_type; ?>" itemprop="sameAs">
                            <a href="<?= $social_network_link['url']; ?>"
                               class="nav__link"
                               target="_blank"
                               title="<?= __trans('Voir ma page'); ?>&nbsp;: <?= $social_network_type; ?>"
                               aria-label="<?= __trans('Voir ma page'); ?>&nbsp;: <?= $social_network_type; ?>">
                                <?= $social_network_link['title']; ?></a>
                        </li>

                    <?php
                    endwhile;
                endif;
                ?>
            </ul>
        </aside>
        <aside class="footer__nav resources">
            <h3 class="footer__nav--title">
                <?= __trans('Ressources'); ?>
            </h3>
            <ul class="footer__nav--list ">

                <?php if (have_rows('resources', 'option')):
                    while (have_rows('resources', 'option')):
                        the_row();
                        $resource_type = get_sub_field('resource-type');
                        $resource_link = get_sub_field('resource-link');
                        ?>

                        <li class="footer__nav--item resource--<?= $resource_type; ?>">
                            <a href="<?= $resource_link['url']; ?>"
                               class="nav__link"
                               target="_blank"
                               title="<?= __trans('Visiter le site de'); ?>&nbsp;: <?= $resource_link['title']; ?>"
                               aria-label="<?= __trans('Visiter le site de'); ?>&nbsp;: <?= $resource_link['title']; ?>">
                                <?= $resource_link['title']; ?>
                            </a>
                        </li>

                    <?php
                    endwhile;
                endif;
                ?>
            </ul>
        </aside>
    </div>
    <div class="legal">
        <?php
        $footer = get_field('footer', 'option');
        $legal_fr = $footer['legal-notices-fr'];
        $legal_en = $footer['legal-notices-en'];
        ?>
        <p>
            <?= __trans('©2025 FLAMANT LORIAN. Tous droits réservés'); ?>
        </p>
        <?php $current_lang = pll_current_language();

        if ($current_lang === 'fr'): ?>
            <a href="<?= $legal_fr['url']; ?>"
               class="legal-notices"
               title="Aller vers la page : Mentions légales"
               aria-label="Aller vers la page : Mentions légales">
                <?= __trans('Mentions légales') ?>
            </a>
        <?php else: ?>
            <a href="<?= $legal_en['url']; ?>"
               class="legal-notices"
               title="Go to page: Legal informations"
               aria-label="Go to page: Legal informations">
                Legal informations
            </a>
        <?php endif; ?>
    </div>
</footer>
</body>
</html>