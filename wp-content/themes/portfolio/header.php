<!DOCTYPE html>
<html lang="<?= __trans('fr'); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Portfolio de Lorian Flamant">
    <meta name="keywords" content="HEPL, Web Developer, Flamant Lorian">
    <meta name="Auhtor" content="<?= get_field('first_name', 'options') . ' ' . get_field('last_name', 'options') ?>">
    <title><?= wp_title('·', 'false', 'right') . get_bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<header>
    <h1>Portfolio de Lorian Flamant</h1>
    <nav>
        <h2 class=""><?= 'Navigation principale'; ?></h2>
        <ul class="nav__container">
            <?php foreach (dw_get_navigation_links('header') as $link): ?>
                <li class="nav__item">
                    <a href="<?= $link->href; ?>" class="nav__links" title="Aller sur la page : <?= $link->label ?>">
                        <?= $link->label; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <ul class="languages__container">
            <?php foreach (pll_the_languages(['raw' => true, 'hide_current' => 1]) as $lang): ?>
                <li class="languages__item<?= $lang['current_lang'] ? ' languages__item--current' : '' ?>">
                    <a href="<?= $lang['url'] ?>" lang="<?= $lang['locale'] ?>" hreflang="<?= $lang['locale'] ?>"
                       class="languages__link"><?= $lang['slug'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
<main>


