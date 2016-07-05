<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult['services'] = [];
$arResult['galery'] = [];

$arName = explode(LANGUAGE_CONTENT_SEPARATOR, $arResult['NAME']);
$arSubName = explode(LANGUAGE_CONTENT_SEPARATOR, $arResult['PROPERTIES']['SUB_NAME']['VALUE']);
$arPriceFrom = explode(LANGUAGE_CONTENT_SEPARATOR, $arResult['PROPERTIES']['PRICE_FROM']['VALUE']);
$arDetailText = explode(LANGUAGE_CONTENT_SEPARATOR, $arResult['DETAIL_TEXT']);

$arResult['NAME'] = (LANGUAGE_ID == 'ru' ? $arName[0] : (isset($arName[1]) ? $arName[1] : $arName[0]));
$arResult['PROPERTIES']['SUB_NAME']['VALUE'] = (LANGUAGE_ID == 'ru' ? $arSubName[0] : (isset($arSubName[1]) ? $arSubName[1] : $arSubName[0]));
$arResult['PROPERTIES']['PRICE_FROM']['VALUE'] = (LANGUAGE_ID == 'ru' ? $arPriceFrom[0] : (isset($arPriceFrom[1]) ? $arPriceFrom[1] : $arPriceFrom[0]));
$arResult['DETAIL_TEXT'] = (LANGUAGE_ID == 'ru' ? $arDetailText[0] : (isset($arDetailText[1]) ? $arDetailText[1] : $arDetailText[0]));

$arResult['PROPERTIES']['ACTION']['VALUE'] = GetMessage('PROPERTY_ACTION_'.$arResult['PROPERTIES']['ACTION']['VALUE_ENUM_ID']);

foreach ($arResult['PROPERTIES']['SERVICES']['VALUE'] as $k => $name)
{
	$arVaruants = explode(LANGUAGE_CONTENT_SEPARATOR, $name);

	$arResult['PROPERTIES']['SERVICES']['VALUE'][$k] = (LANGUAGE_ID == 'ru' ? $arVaruants[0] : (isset($arVaruants[1]) ? $arVaruants[1] : $arVaruants[0]));
}

if(count($arResult['PROPERTIES']['SERVICES']['VALUE'])>0)
	$arResult['services'] = array_chunk($arResult['PROPERTIES']['SERVICES']['VALUE'], round(count($arResult['PROPERTIES']['SERVICES']['VALUE']) / 2));

if(count($arResult['PROPERTIES']['SERVICES']['VALUE'])>0)
{
	foreach($arResult['PROPERTIES']['GALERY']['VALUE'] as $imageId)
		$arResult['galery'][] = \CFile::GetFileArray($imageId);
}

$this->__component->SetResultCacheKeys(['NAME', 'DETAIL_TEXT', 'DETAIL_PICTURE']);