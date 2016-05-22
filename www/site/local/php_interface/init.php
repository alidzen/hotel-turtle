<?php

if (isset($_REQUEST['ajax']) || isset($_REQUEST['ajax_basket']) || (isset($_REQUEST['is_ajax_post']) && $_REQUEST['is_ajax_post'] == 'Y'))
{
	define('SITE_TEMPLATE_PREVIEW_MODE', true);
	define('NO_KEEP_STATISTIC', true);
	define('STOP_STATISTICS', true);
	define('NO_AGENT_CHECK', true);
	define('NO_AGENT_STATISTIC', true);
	define('PERFMON_STOP', true);
}

// подключение сторонних функций
include_once($_SERVER['DOCUMENT_ROOT'].'/local/php_interface/functions.php');
// подключение событий
include_once($_SERVER['DOCUMENT_ROOT'].'/local/php_interface/handlers.php');

?>