<?php

use \Bitrix\Main;

$arResult['ITEMS'] = null;

if(Main\Loader::includeModule('iblock'))
{
	$rsItems = \CIBlockElement::GetList(
		['SORT' => 'ASC'],
		['IBLOCK_ID' => 3, 'ACTIVE' => 'Y'],
		false,
		false,
		['IBLOCK_ID', 'ID', 'NAME', 'PROPERTY_TYPE', 'PROPERTY_FILE', 'PREVIEW_TEXT', 'PROPERTY_TYPE_BORDER']
	);

	while($arItem = $rsItems->Fetch())
	{
		$arResult['ITEMS'][] = [
			'ID' 		=> $arItem['ID'],
			'NAME'		=> $arItem['NAME'],
			'IMAGE' 	=> ($arItem['PROPERTY_FILE_VALUE'] > 0 ? \CFile::GetPath($arItem['PROPERTY_FILE_VALUE']) : null),
			'BLOCK_TYPE'=> [
				'VALUE' => $arItem['PROPERTY_TYPE_VALUE'],
				'BORDER'=> ($arItem['PROPERTY_TYPE_BORDER_VALUE'] == 'Y')
			],
			'PREVIEW_TEXT' => $arItem['PREVIEW_TEXT']
		];
	}
}