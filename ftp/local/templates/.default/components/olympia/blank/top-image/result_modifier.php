<?php

use \Bitrix\Main;

$arResult['ITEMS'] = null;

if(Main\Loader::includeModule('iblock'))
{
	$arElement = \CIBlockElement::GetList(
		['SORT' => 'ASC'],
		['IBLOCK_ID' => 4, 'ACTIVE' => 'Y', 'PROPERTY_LOCATION' => $APPLICATION->GetCurDir()],
		false,
		false,
		['IBLOCK_ID', 'ID', 'PROPERTY_IMAGES', 'PROPERTY_LOCATION']
	)->Fetch();

	if($arElement['PROPERTY_IMAGES_VALUE'] > 0)
	{
		$rsItems = \CIBlockElement::GetList(
			['SORT' => 'ASC'],
			['IBLOCK_ID' => 5, 'ACTIVE' => 'Y', 'SECTION_ID' => $arElement['PROPERTY_IMAGES_VALUE']],
			false,
			false,
			['IBLOCK_ID', 'ID', 'PROPERTY_ACTION_TPE', 'PROPERTY_ACTION_TTL', 'PROPERTY_ACTION_TXT', 'PREVIEW_PICTURE', 'PREVIEW_TEXT', 'PROPERTY_BLACK']
		);

		while($arItem = $rsItems->Fetch())
		{
			$action = ($arItem['PROPERTY_ACTION_TPE'] != '' ? ['TYPE' => $arItem['PROPERTY_ACTION_TPE_VALUE'], 'TITLE' => $arItem['PROPERTY_ACTION_TTL'], 'TEXT' => $arItem['PROPERTY_ACTION_TXT']] : null);

			$arResult['ITEMS'][] = [
				'ID' 		=> $arItem['ID'],
				'IMAGE' 	=> ($arItem['PREVIEW_PICTURE'] > 0 ? \CFile::GetPath($arItem['PREVIEW_PICTURE']) : null),
				'ACTION' 	=> $action,
				'PREVIEW_TEXT' => $arItem['PREVIEW_TEXT'],
				'THEME_BLACK'  => ($arItem['PROPERTY_BLACK_VALUE'] == 'Y')
			];
		}
	}
}