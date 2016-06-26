<?php

use Bitrix\Main;

$arResult['ITEMS'] = null;

if(Main\Loader::includeModule('iblock'))
{
	$rsItems = \CIBlockElement::GetList(
		['SORT' => 'ASC'],
		['IBLOCK_ID' => 3, 'ACTIVE' => 'Y'],
		false,
		false, ['IBLOCK_ID', 'ID', 'NAME', 'CODE', 'PROPERTY_TYPE', 'PROPERTY_FILE', 'PREVIEW_TEXT', 'PROPERTY_TYPE_BORDER']
	);

	while($arItem = $rsItems->Fetch())
	{
		$arName = explode(LANGUAGE_CONTENT_SEPARATOR, $arItem['NAME']);
		$arPreviewText = explode(LANGUAGE_CONTENT_SEPARATOR, $arItem['PREVIEW_TEXT']);

		$arResult['ITEMS'][] = [
			'ID' 		=> $arItem['ID'], 'NAME' => (LANGUAGE_ID == 'ru' ? $arName[0] : (isset($arName[1]) ? $arName[1] : $arName[0])), 'CODE' => $arItem['CODE'],
			'IMAGE' 	=> ($arItem['PROPERTY_FILE_VALUE'] > 0 ? \CFile::GetPath($arItem['PROPERTY_FILE_VALUE']) : null),
			'BLOCK_TYPE'=> [
				'VALUE' => $arItem['PROPERTY_TYPE_VALUE'],
				'BORDER'=> ($arItem['PROPERTY_TYPE_BORDER_VALUE'] == 'Y')
			], 'PREVIEW_TEXT' => (LANGUAGE_ID == 'ru' ? $arPreviewText[0] : (isset($arPreviewText[1]) ? $arPreviewText[1] : $arPreviewText[0]))
		];
	}
}