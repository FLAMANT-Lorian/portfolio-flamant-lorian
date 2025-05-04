</main>
<footer class="footer">
    <nav class="footer__container">
        <h2 class="sro">Navigation Secondaire</h2>
        <ul class="footer__nav">
            <h3 class="footer__nav--title">
                Navigation
            </h3>
            <?php foreach (dw_get_navigation_links('footer') as $link): ?>
                <li class="footer__nav--item">
                    <a href="<?= $link->href; ?>" class="nav__link"
                       title="<?= __trans('Aller sur la page : ') ?><?= $link->label ?>">
                        <?= $link->label; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <ul class="footer__nav">
            <h3 class="footer__nav--title">
                Retrouvez-moi
            </h3>
            <?php if (have_rows('social-networks', 'option')):
                while (have_rows('social-networks', 'option')):
                    the_row();
                    $social_network_type = get_sub_field('social-network-type');
                    $social_network_link = get_sub_field('social-network-link');
                    ?>

                    <li class="footer__nav--item social__network--<?= $social_network_type; ?>">
                        <a href="<?= $social_network_link['url']; ?>"
                           class="nav__link"><?= $social_network_link['title']; ?></a>
                    </li>

                <?php
                endwhile;
            endif;
            ?>
        </ul>
        <ul class="footer__nav">
            <h3 class="footer__nav--title">
                Ressources
            </h3>
            <?php if (have_rows('resources', 'option')):
                while (have_rows('resources', 'option')):
                    the_row();
                    $resource_type = get_sub_field('resource-type');
                    $resource_link = get_sub_field('resource-link');
                    ?>

                    <li class="footer__nav--item resource--<?= $resource_type; ?>">
                        <a href="<?= $resource_link['url']; ?>"
                           class="nav__link"><?= $resource_link['title']; ?></a>
                    </li>

                <?php
                endwhile;
            endif;
            ?>
        </ul>
    </nav>
    <div class="legal">
        <?php
        $footer = get_field('footer', 'option');
        $my_site = $footer['site-link'];
        $legal = $footer['legal-notices'];
        ?>
        <p>
            ©2025 FLAMANT LORIAN. Tous droits réservés
        </p>
        <p>
            Site réalisé par
            <a href="<?= $my_site['url']; ?>"
               class="owner-site">
                <?= $my_site['title']; ?>
            </a>
        </p>
        <a href="<?= $legal['url']; ?>"
           class="legal-notices">
            <?= $legal['title']; ?>
        </a>
    </div>
</footer>
</body>
</html>