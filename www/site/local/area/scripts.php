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

$assetManager->addString('<link rel="shortcut icon" type="image/x-icon" href="/local/assets/favicons/favicon.ico">');
$assetManager->addString('<link rel="apple-touch-icon-precomposed" sizes="57x57" href="/local/assets/favicons/apple-touch-icon-57x57-precomposed.png">');
$assetManager->addString('<link rel="apple-touch-icon-precomposed" sizes="76x76" href="/local/assets/favicons/apple-touch-icon-76x76-precomposed.png">');
$assetManager->addString('<link rel="apple-touch-icon-precomposed" sizes="120x120" href="/local/assets/favicons/apple-touch-icon-120x120-precomposed.png">');
$assetManager->addString('<link rel="apple-touch-icon-precomposed" sizes="152x152" href="/local/assets/favicons/apple-touch-icon-152x152-precomposed.png">');
$assetManager->addString('<link rel="apple-touch-icon-precomposed" sizes="180x180" href="/local/assets/favicons/apple-touch-icon-180x180-precomposed.png">');
$assetManager->addString('<link rel="icon" sizes="192x192" href="/local/assets/favicons/touch-icon-192x192.png">');
$assetManager->addString('<!--[if IE]><script data-skip-moving src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->');
$assetManager->addString('<!--[if lt IE 9]><script data-skip-moving src="js/respond.min.js" defer></script><![endif]-->');