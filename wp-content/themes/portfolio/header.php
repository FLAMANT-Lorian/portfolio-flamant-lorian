<!DOCTYPE html>
<html lang="<?= __trans('fr'); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= __trans('Portfolio de Lorian Flamant'); ?>">
    <meta name="keywords" content="HEPL, Web Developer, Flamant Lorian">
    <meta name="Auhtor" content="<?= get_field('first_name', 'options') . ' ' . get_field('last_name', 'options') ?>">
    <title><?= get_the_title() . ' · Portoflio' ?></title>
    <link rel="stylesheet" type="text/css" href="<?= portfolio_asset('css'); ?>">
    <script src="<?= portfolio_asset('js') ?>" defer></script>
</head>
<body>
<p class="no-js--message">
    <?= __trans('Pour accéder à toutes les fonctionnalités de ce site, vous devez activer JavaScript.'); ?>
    <?= __trans('Voici les'); ?>
    <a href="https://www.enable-javascript.com/fr/"><?= __trans('instructions pour activer JavaScript dans votre navigateur Web') ?>
        .</a>
</p>
<header class="header">
    <h1 class="sro"><?= __trans('Portfolio de Lorian Flamant'); ?></h1>
    <nav class="nav__bar">
        <a class="skip__link sro" href="#contenu"
           title="<?= __trans('Aller directement au contenu principal de la page'); ?>" tabindex="1">
            <?= __trans('Aller vers le contenu de la page'); ?>
        </a>
        <figure class="logo__container">
            <img src="" alt="Logo" class="logo">
        </figure>
        <input type="checkbox" tabindex="0" id="toggle__checkbox" class="bgm--checkbox">
        <label for="toggle__checkbox" class="bgm--label">
            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2H22" stroke-width="3" stroke-linecap="round"/>
                <path d="M2 11H22" stroke-width="3" stroke-linecap="round"/>
                <path d="M2 20H22" stroke-width="3" stroke-linecap="round"/>
            </svg>

        </label>
        <h2 class="sro"><?= __trans('Navigation principale'); ?></h2>
        <ul class="nav__container">
            <?php foreach (dw_get_navigation_links('header') as $link): ?>
                <?php
                $current_url = rtrim(wp_get_canonical_url(), '/');
                $link_url = rtrim($link->href, '/');
                $is_active = $current_url === $link_url;
                ?>
                <li class="nav__item">
                    <a href="<?= $link->href; ?>"
                       class="nav__links <?= $is_active ? 'active' : ''; ?>"
                       title="<?= __trans('Aller sur la page : ') ?><?= $link->label ?>">
                        <?= $link->label; ?>
                    </a>
                </li>
            <?php endforeach; ?>
            <?php foreach (pll_the_languages(['raw' => true, 'hide_current' => 1]) as $lang): ?>
                <li class="nav__item languages__item<?= $lang['current_lang'] ? ' languages__item--current' : '' ?>">
                    <a href="<?= $lang['url'] ?>" lang="<?= $lang['locale'] ?>" hreflang="<?= $lang['locale'] ?>"
                       class="languages__link"><?= $lang['slug'] ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
<div class="lines">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
</div>
<main id="contenu">