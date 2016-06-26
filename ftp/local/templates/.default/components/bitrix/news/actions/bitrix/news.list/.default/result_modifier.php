<?php

foreach ($arResult['ITEMS'] as &$arItem)
{
	$arName = explode(LANGUAGE_CONTENT_SEPARATOR, $arItem['NAME']);
	$arSubName = explode(LANGUAGE_CONTENT_SEPARATOR, $arItem['PROPERTIES']['SUB_NAME']['VALUE']);
	$arPreviewText = explode(LANGUAGE_CONTENT_SEPARATOR, $arItem['PREVIEW_TEXT']);

	$arItem['NAME'] = (LANGUAGE_ID == 'ru' ? $arName[0] : (isset($arName[1]) ? $arName[1] : $arName[0]));
	$arItem['PROPERTIES']['SUB_NAME']['VALUE'] =(LANGUAGE_ID == 'ru' ? $arSubName[0] : (isset($arSubName[1]) ? $arSubName[1] : $arSubName[0]));
	$arItem['PREVIEW_TEXT'] = (LANGUAGE_ID == 'ru' ? $arPreviewText[0] : (isset($arPreviewText[1]) ? $arPreviewText[1] : $arPreviewText[0]));
}

unset($arItem);