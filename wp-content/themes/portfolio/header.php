<!DOCTYPE html>
<html lang="<?= __trans('fr'); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= __trans('Portfolio de Lorian Flamant'); ?>">
    <meta name="keywords" content="HEPL, Web Developer, Flamant Lorian">
    <meta name="Auhtor" content="<?= get_field('first_name', 'options') . ' ' . get_field('last_name', 'options') ?>">
    <title><?= get_the_title() . ' · Portoflio' ?></title>
    <link rel="stylesheet" href="<?= portfolio_asset('css'); ?>">
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
        <a href="<?= home_url(); ?>"
           title="<?= __trans('Retourner à la page d’accueil'); ?>" class="logo">
            <svg width="117" height="32" viewBox="0 0 117 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path class="fill"
                      d="M18.7141 7.61302V3.75516H6.34882C5.07846 3.75516 4.05035 4.79255 4.05035 6.07106V25.3351C4.05035 26.6151 5.07994 27.7626 6.34882 27.7626H8.20266V17.8783H17.0272V14.1187H8.20266V7.61302H18.7141Z"/>
                <path class="fill"
                      d="M20.6109 3.75665V21.5725C20.6109 22.8525 19.5813 23.8884 18.3124 23.8884H9.92065V27.7641H22.4854C23.7558 27.7641 24.7839 26.7267 24.7839 25.4482V6.07256C24.7839 4.79256 23.7543 3.75665 22.4854 3.75665H20.6109Z"/>
                <path class="fill"
                      d="M95.7791 18.1023V29.7386H93.6541L88.5916 22.4148H88.5064V29.7386H86.0461V18.1023H88.2052L93.228 25.4205H93.3302V18.1023H95.7791Z"/>
                <path class="fill"
                      d="M76.0831 29.7386H73.4467L77.4638 18.1023H80.6342L84.6456 29.7386H82.0092L79.0944 20.7614H79.0035L76.0831 29.7386ZM75.9183 25.1648H82.1456V27.0852H75.9183V25.1648Z"/>
                <path class="fill"
                      d="M72.0532 18.1023V29.7386H69.593V18.1023H72.0532Z"/>
                <path class="fill"
                      d="M59.093 29.7386V18.1023H63.6839C64.5627 18.1023 65.3127 18.2595 65.9339 18.5739C66.5589 18.8845 67.0343 19.3258 67.3601 19.8977C67.6896 20.4659 67.8544 21.1345 67.8544 21.9034C67.8544 22.6761 67.6877 23.3409 67.3544 23.8977C67.021 24.4508 66.5381 24.875 65.9055 25.1705C65.2767 25.4659 64.5154 25.6136 63.6214 25.6136H60.5476V23.6364H63.2237C63.6934 23.6364 64.0835 23.572 64.3942 23.4432C64.7048 23.3144 64.9358 23.1212 65.0873 22.8636C65.2426 22.6061 65.3203 22.286 65.3203 21.9034C65.3203 21.5171 65.2426 21.1913 65.0873 20.9261C64.9358 20.661 64.7029 20.4602 64.3885 20.3239C64.0779 20.1837 63.6858 20.1136 63.2123 20.1136H61.5532V29.7386H59.093ZM65.3771 24.4432L68.2692 29.7386H65.5532L62.7237 24.4432H65.3771Z"/>
                <path class="fill"
                      d="M57.2706 23.9205C57.2706 25.1894 57.0301 26.2689 56.549 27.1591C56.0717 28.0493 55.4202 28.7292 54.5945 29.1989C53.7725 29.6648 52.8482 29.8977 51.8217 29.8977C50.7876 29.8977 49.8596 29.6629 49.0376 29.1932C48.2157 28.7235 47.566 28.0436 47.0888 27.1534C46.6115 26.2633 46.3729 25.1856 46.3729 23.9205C46.3729 22.6515 46.6115 21.572 47.0888 20.6818C47.566 19.7917 48.2157 19.1136 49.0376 18.6477C49.8596 18.178 50.7876 17.9432 51.8217 17.9432C52.8482 17.9432 53.7725 18.178 54.5945 18.6477C55.4202 19.1136 56.0717 19.7917 56.549 20.6818C57.0301 21.572 57.2706 22.6515 57.2706 23.9205ZM54.7763 23.9205C54.7763 23.0985 54.6532 22.4053 54.407 21.8409C54.1645 21.2765 53.8217 20.8485 53.3785 20.5568C52.9354 20.2652 52.4164 20.1193 51.8217 20.1193C51.227 20.1193 50.7081 20.2652 50.2649 20.5568C49.8217 20.8485 49.477 21.2765 49.2308 21.8409C48.9884 22.4053 48.8672 23.0985 48.8672 23.9205C48.8672 24.7424 48.9884 25.4356 49.2308 26C49.477 26.5644 49.8217 26.9924 50.2649 27.2841C50.7081 27.5758 51.227 27.7216 51.8217 27.7216C52.4164 27.7216 52.9354 27.5758 53.3785 27.2841C53.8217 26.9924 54.1645 26.5644 54.407 26C54.6532 25.4356 54.7763 24.7424 54.7763 23.9205Z"/>
                <path class="fill"
                      d="M37.9524 29.7386V18.1023H40.4126V27.7102H45.4013V29.7386H37.9524Z"/>
                <path class="fill"
                      d="M106.587 4.13069V2.10228H116.144V4.13069H112.582V13.7386H110.15V4.13069H106.587Z"/>
                <path class="fill"
                      d="M104.998 2.10228V13.7386H102.873L97.8103 6.41478H97.7251V13.7386H95.2649V2.10228H97.424L102.447 9.42046H102.549V2.10228H104.998Z"/>
                <path class="fill"
                      d="M85.3018 13.7386H82.6655L86.6825 2.10228H89.853L93.8643 13.7386H91.228L88.3132 4.76137H88.2223L85.3018 13.7386ZM85.1371 9.16478H91.3643V11.0852H85.1371V9.16478Z"/>
                <path class="fill"
                      d="M68.6555 2.10228H71.6896L74.8942 9.92046H75.0305L78.2351 2.10228H81.2692V13.7386H78.8828V6.16478H78.7862L75.7748 13.6818H74.1498L71.1385 6.13637H71.0419V13.7386H68.6555V2.10228Z"/>
                <path class="fill"
                      d="M58.6925 13.7386H56.0561L60.0731 2.10228H63.2436L67.255 13.7386H64.6186L61.7038 4.76137H61.6129L58.6925 13.7386ZM58.5277 9.16478H64.755V11.0852H58.5277V9.16478Z"/>
                <path class="fill"
                      d="M47.3118 13.7386V2.10228H49.772V11.7102H54.7606V13.7386H47.3118Z"/>
                <path class="fill"
                      d="M37.9524 13.7386V2.10228H45.6569V4.13069H40.4126V6.90342H45.1456V8.93183H40.4126V13.7386H37.9524Z"/>
            </svg>
        </a>
        <input type="checkbox" tabindex="0" id="toggle__checkbox" class="bgm--checkbox">
        <label for="toggle__checkbox" class="bgm--label">
            <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2H22" stroke-width="3" stroke-linecap="round"/>
                <path d="M5 11H19" stroke-width="3" stroke-linecap="round"/>
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