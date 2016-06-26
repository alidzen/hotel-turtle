<?php

use \Bitrix\Main;

$arResult['ITEMS'] = null;

if(Main\Loader::includeModule('iblock'))
{
	$arElement = \CIBlockElement::GetList(
		['SORT' => 'ASC'],
		['IBLOCK_ID' => 6, 'ACTIVE' => 'Y', 'CODE' => $arParams['CODE']],
		false,
		false,
		['IBLOCK_ID', 'ID', 'PROPERTY_IMAGES']
	)->Fetch();

	if(count($arElement['PROPERTY_IMAGES_VALUE']) > 0)
	{
		foreach($arElement['PROPERTY_IMAGES_VALUE'] as $imageId)
			$arResult['ITEMS'][] = [
				'NAME' => $arElement['NAME'],
				'RESIZE_IMAGE' => \CFile::ResizeImageGet($imageId, ['width' => 825, 'height' => 650], BX_RESIZE_IMAGE_EXACT)
			];
	}
}