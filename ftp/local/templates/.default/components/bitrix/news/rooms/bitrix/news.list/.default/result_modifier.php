<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult['ITEMS'] as $k => $item)
{
	$arName = explode(LANGUAGE_CONTENT_SEPARATOR, $item['FIELDS']['NAME']);
	$arSubName = explode(LANGUAGE_CONTENT_SEPARATOR, $item['PROPERTIES']['SUB_NAME']['VALUE']);
	$arPriceFrom = explode(LANGUAGE_CONTENT_SEPARATOR, $item['PROPERTIES']['PRICE_FROM']['VALUE']);

	$arResult["ITEMS"][$k]['FIELDS']['NAME'] = (LANGUAGE_ID == 'ru' ? $arName[0] : (isset($arName[1]) ? $arName[1] : $arName[0]));
	$arResult["ITEMS"][$k]['PROPERTIES']['SUB_NAME']['VALUE'] = (LANGUAGE_ID == 'ru' ? $arSubName[0] : (isset($arSubName[1]) ? $arSubName[1] : $arSubName[0]));
	$arResult["ITEMS"][$k]['PROPERTIES']['PRICE_FROM']['VALUE'] = (LANGUAGE_ID == 'ru' ? $arPriceFrom[0] : (isset($arPriceFrom[1]) ? $arPriceFrom[1] : $arPriceFrom[0]));

	$arResult['ITEMS'][$k]['PROPERTIES']['ACTION']['VALUE'] = GetMessage('PROPERTY_ACTION_' . $item['PROPERTIES']['ACTION']['VALUE_ENUM_ID']);
}


