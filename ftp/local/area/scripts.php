<?php

use Bitrix\Main\Page\Asset;

$assetManager = Asset::getInstance();

$assetManager->addCss('/local/assets/js/lib/jquery-selectric/public/selectric.css');
$assetManager->addCss('/local/assets/js/lib/magnific-popup/dist/magnific-popup.css');
$assetManager->addCss('/local/assets/js/lib/fotorama/fotorama.css');
$assetManager->addCss('/local/assets/js/lib/jquery.ui/themes/base/datepicker.css');
$assetManager->addCss('/local/assets/css/app.css');
$assetManager->addString('<script src="/local/assets/js/lib/requirejs/require.min.js" data-main="/local/assets/js/config.js"></script>');
$assetManager->addCss('/local/assets/css/custom.css');

$assetManager->addString('<link rel="apple-touch-icon" sizes="57x57" href="/local/assets/favicons/apple-touch-icon-57x57.png">');
$assetManager->addString('<link rel="apple-touch-icon" sizes="60x60" href="/local/assets/favicons/apple-touch-icon-60x60.png">');
$assetManager->addString('<link rel="apple-touch-icon" sizes="72x72" href="/local/assets/favicons/apple-touch-icon-72x72.png">');
$assetManager->addString('<link rel="apple-touch-icon" sizes="76x76" href="/local/assets/favicons/apple-touch-icon-76x76.png">');
$assetManager->addString('<link rel="apple-touch-icon" sizes="114x114" href="/local/assets/favicons/apple-touch-icon-114x114.png">');
$assetManager->addString('<link rel="apple-touch-icon" sizes="120x120" href="/local/assets/favicons/apple-touch-icon-120x120.png">');
$assetManager->addString('<link rel="apple-touch-icon" sizes="144x144" href="/local/assets/favicons/apple-touch-icon-144x144.png">');
$assetManager->addString('<link rel="apple-touch-icon" sizes="152x152" href="/local/assets/favicons/apple-touch-icon-152x152.png">');
$assetManager->addString('<link rel="apple-touch-icon" sizes="180x180" href="/local/assets/favicons/apple-touch-icon-180x180.png">');
$assetManager->addString('<link rel="icon" type="image/png" href="/local/assets/favicons/favicon-32x32.png" sizes="32x32">');
$assetManager->addString('<link rel="icon" type="image/png" href="/local/assets/favicons/android-chrome-192x192.png" sizes="192x192">');
$assetManager->addString('<link rel="icon" type="image/png" href="/local/assets/favicons/favicon-96x96.png" sizes="96x96">');
$assetManager->addString('<link rel="icon" type="image/png" href="/local/assets/favicons/favicon-16x16.png" sizes="16x16">');
$assetManager->addString('<link rel="manifest" href="/local/assets/favicons/manifest.json">');
$assetManager->addString('<link rel="mask-icon" href="/local/assets/favicons/safari-pinned-tab.svg" color="#5bbad5">');
$assetManager->addString('<meta name="apple-mobile-web-app-title" content="Отель Ахиллес и черепаха">');
$assetManager->addString('<meta name="application-name" content="Отель Ахиллес и черепаха">');
$assetManager->addString('<meta name="msapplication-TileColor" content="#da532c">');
$assetManager->addString('<meta name="msapplication-TileImage" content="/mstile-144x144.png">');
$assetManager->addString('<meta name="theme-color" content="#ffffff">');
$assetManager->addString('<!--[if IE]><script data-skip-moving src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->');
$assetManager->addString('<!--[if lt IE 9]><script data-skip-moving src="js/respond.min.js" defer></script><![endif]-->');
