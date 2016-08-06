<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult['ITEMS'] as &$item)
{
	$arName = explode(LANGUAGE_CONTENT_SEPARATOR, $item['FIELDS']['NAME']);
	$arSubName = explode(LANGUAGE_CONTENT_SEPARATOR, $item['PROPERTIES']['SUB_NAME']['VALUE']);
	$arPriceFrom = explode(LANGUAGE_CONTENT_SEPARATOR, $item['PROPERTIES']['PRICE_FROM']['VALUE']);
	$arDetailText = explode(LANGUAGE_CONTENT_SEPARATOR, $item['FIELDS']['DETAIL_TEXT']);

	$item['FIELDS']['NAME'] = (LANGUAGE_ID == 'ru' ? $arName[0] : (isset($arName[1]) ? $arName[1] : $arName[0]));
	$item['FIELDS']['DETAIL_TEXT'] = (LANGUAGE_ID == 'ru' ? $arDetailText[0] : (isset($arDetailText[1]) ? $arDetailText[1] : $arDetailText[0]));
	$item['PROPERTIES']['SUB_NAME']['VALUE'] = (LANGUAGE_ID == 'ru' ? $arSubName[0] : (isset($arSubName[1]) ? $arSubName[1] : $arSubName[0]));
	$item['PROPERTIES']['PRICE_FROM']['VALUE'] = (LANGUAGE_ID == 'ru' ? $arPriceFrom[0] : (isset($arPriceFrom[1]) ? $arPriceFrom[1] : $arPriceFrom[0]));

	$item['PROPERTIES']['ACTION']['VALUE'] = GetMessage('PROPERTY_ACTION_' . $item['PROPERTIES']['ACTION']['VALUE_ENUM_ID']);

	foreach ($item['PROPERTIES']['SERVICES']['VALUE'] as $n => $name)
	{
		$arVaruants = explode(LANGUAGE_CONTENT_SEPARATOR, $name);

		$item['PROPERTIES']['SERVICES']['VALUE'][$n] = (LANGUAGE_ID == 'ru' ? $arVaruants[0] : (isset($arVaruants[1]) ? $arVaruants[1] : $arVaruants[0]));
	}

	if(count($item['PROPERTIES']['SERVICES']['VALUE'])>0)
		$item['services'] = array_chunk($item['PROPERTIES']['SERVICES']['VALUE'], round(count($item['PROPERTIES']['SERVICES']['VALUE']) / 2));

	if(count($item['PROPERTIES']['GALERY']['VALUE'])>0)
		foreach($item['PROPERTIES']['GALERY']['VALUE'] as $imageId)
			$item['galery'][] = \CFile::GetFileArray($imageId);
}

unset($item);


