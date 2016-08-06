<?php

$arName = explode(LANGUAGE_CONTENT_SEPARATOR, $arResult['NAME']);
$arSubName = explode(LANGUAGE_CONTENT_SEPARATOR, $arResult['PROPERTIES']['SUB_NAME']['VALUE']);
$arHeaderText = explode(LANGUAGE_CONTENT_SEPARATOR, $arResult['PROPERTIES']['HEADER_TXT']['VALUE']['TEXT']);
$arDetailText = explode(LANGUAGE_CONTENT_SEPARATOR, $arResult['DETAIL_TEXT']);

$arResult['NAME'] = (LANGUAGE_ID == 'ru' ? $arName[0] : (isset($arName[1]) ? $arName[1] : $arName[0]));
$arResult['PROPERTIES']['SUB_NAME']['VALUE'] = (LANGUAGE_ID == 'ru' ? $arSubName[0] : (isset($arSubName[1]) ? $arSubName[1] : $arSubName[0]));
$arResult['PROPERTIES']['HEADER_TXT']['VALUE']['TEXT'] = (LANGUAGE_ID == 'ru' ? $arHeaderText[0] : (isset($arHeaderText[1]) ? $arHeaderText[1] : $arHeaderText[0]));
$arResult['DETAIL_TEXT'] = (LANGUAGE_ID == 'ru' ? $arDetailText[0] : (isset($arDetailText[1]) ? $arDetailText[1] : $arDetailText[0]));

$this->__component->SetResultCacheKeys([
	'NAME',
	'DETAIL_TEXT',
	'DETAIL_PICTURE',
	'PROPERTIES'
]);