<?php

foreach ($arResult['ITEMS'] as &$arItem)
{
	$arName = explode(LANGUAGE_CONTENT_SEPARATOR, $arItem['NAME']);
	$arPreviewText = explode(LANGUAGE_CONTENT_SEPARATOR, $arItem['PREVIEW_TEXT']);

	$arItem['NAME'] = (LANGUAGE_ID == 'ru' ? $arName[0] : (isset($arName[1]) ? $arName[1] : $arName[0]));
	$arItem['PREVIEW_TEXT'] = (LANGUAGE_ID == 'ru' ? $arPreviewText[0] : (isset($arPreviewText[1]) ? $arPreviewText[1] : $arPreviewText[0]));
}

unset($arItem);