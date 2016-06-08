<?

$arResult['services'] = [];
$arResult['galery'] = [];

if(count($arResult['PROPERTIES']['SERVICES']['VALUE'])>0)
	$arResult['services'] = array_chunk($arResult['PROPERTIES']['SERVICES']['VALUE'], round(count($arResult['PROPERTIES']['SERVICES']['VALUE']) / 2));

if(count($arResult['PROPERTIES']['SERVICES']['VALUE'])>0)
{
	foreach($arResult['PROPERTIES']['GALERY']['VALUE'] as $imageId)
		$arResult['galery'][] = \CFile::GetFileArray($imageId);
}