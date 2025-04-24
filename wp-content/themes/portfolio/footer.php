</main>
<footer>
    <nav>
        <h2>Navigation Secondaire</h2>
        <ul>
            <?php if (have_rows('social-networks', 'option')):
                while (have_rows('social-networks', 'option')):
                    the_row();
                    $social_network_type = get_sub_field('social-network-type');
                    $social_network_link = get_sub_field('social-network-link');
                    ?>

                    <li class="social__network--<?= $social_network_type; ?>">
                        <a href="<?= $social_network_link['url']; ?>"><?= $social_network_link['title']; ?></a>
                    </li>

                <?php
                endwhile;
            endif;
            ?>
        </ul>
        <ul class="nav__container">
            <?php foreach (dw_get_navigation_links('footer') as $link): ?>
                <li class="nav__item">
                    <a href="<?= $link->href; ?>" class="nav__links"
                       title="<?= __trans('Aller sur la page : ') ?><?= $link->label ?>">
                        <?= $link->label; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <ul>
            <?php if (have_rows('resources', 'option')):
                while (have_rows('resources', 'option')):
                    the_row();
                    $resource_type = get_sub_field('resource-type');
                    $resource_link = get_sub_field('resource-link');
                    ?>

                    <li class="social__network--<?= $resource_type; ?>">
                        <a href="<?= $resource_link['url']; ?>"><?= $resource_link['title']; ?></a>
                    </li>

                <?php
                endwhile;
            endif;
            ?>
        </ul>
    </nav>
    <p>© <?= get_bloginfo('name'); ?></p>
</footer>
</body>
</html>