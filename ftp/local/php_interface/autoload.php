<?php
use \Bitrix\Main\Loader;

Loader::registerAutoLoadClasses($module = null, [
  'olympia\\TripAdvisor' => '/local/lib/COTripAdvisor.php',
]);