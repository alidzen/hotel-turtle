<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:map.google.view", 
	"contacts", 
	array(
		"CONTROLS" => array(
			0 => "SMALL_ZOOM_CONTROL",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "ROADMAP",
		"MAP_DATA" => "a:4:{s:10:\"google_lat\";d:55.73994285973544;s:10:\"google_lon\";d:37.56576088867188;s:12:\"google_scale\";i:13;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:4:\"TEXT\";s:10:\"Отель\";s:3:\"LON\";d:30.346437692642212;s:3:\"LAT\";d:59.92354664791721;}}}",
		"MAP_HEIGHT" => "500",
		"MAP_ID" => "",
		"MAP_WIDTH" => "600",
		"OPTIONS" => array(
			0 => "ENABLE_SCROLL_ZOOM",
			1 => "ENABLE_DBLCLICK_ZOOM",
			2 => "ENABLE_DRAGGING",
			3 => "ENABLE_KEYBOARD",
		),
		"COMPONENT_TEMPLATE" => "contacts"
	),
	false
);?>

<? $APPLICATION->IncludeFile('/local/area/contacts-form-block.php', Array(), Array('MODE' => 'php')); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
