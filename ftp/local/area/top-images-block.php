<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main;

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
['IBLOCK_ID', 'ID', 'PROPERTY_ACTION_LINK', 'PROPERTY_ACTION_TPE', 'PROPERTY_ACTION_TTL', 'PROPERTY_ACTION_TXT', 'PREVIEW_PICTURE', 'PREVIEW_TEXT', 'PROPERTY_BLACK']
);

while($arItem = $rsItems->Fetch())
{
$action = ($arItem['PROPERTY_ACTION_TPE_VALUE'] != '' ? ['LINK' => $arItem['PROPERTY_ACTION_LINK_VALUE'], 'TYPE'  => $arItem['PROPERTY_ACTION_TPE_VALUE'], 'TITLE' => $arItem['PROPERTY_ACTION_TTL_VALUE'], 'TEXT'  => $arItem['PROPERTY_ACTION_TXT_VALUE'] ] : null);
$arPreviewText = explode('####', $arItem['PREVIEW_TEXT']);

$arButtons = \CIBlock::GetPanelButtons(
$arItem["IBLOCK_ID"],
$arItem["ID"],
0,
[
"SECTION_BUTTONS" => false,
"SESSID"          => false
]
);

$arResult['ITEMS'][] = [
'ID'           => $arItem['ID'],
'IMAGE'        => ($arItem['PREVIEW_PICTURE'] > 0 ? \CFile::GetPath($arItem['PREVIEW_PICTURE']) : null),
'ACTION'       => $action,
'PREVIEW_TEXT' => (LANGUAGE_ID == 'ru' ? $arPreviewText[0] : (isset($arPreviewText[1]) ? $arPreviewText[1] : $arPreviewText[0])),
'THEME_BLACK'  => ($arItem['PROPERTY_BLACK_VALUE'] == 'Y'),
'EDIT_LINK'    => $arButtons["edit"]["edit_element"]["ACTION_URL"],
'DELETE_LINK'  => $arButtons["edit"]["delete_element"]["ACTION_URL"]
];
}
}
}
?>


<?if($arResult['ITEMS'] != NULL):?>
<div class="l-header__gallery">
    <?if(count($arResult['ITEMS'])>1):?>
    <div class="b-gallery b-gallery_theme_home j-gallery">
        <div data-height="100%" data-width="100%" data-arrows="false"
             data-nav="dots" data-fit="cover" data-loop="true"
             data-autoplay="false" data-transition="dissolve"
             data-transitionduration="600" data-margin="-1"
             class="b-gallery__base">
            <?foreach($arResult['ITEMS'] as $arItem):?>
            <?if($arItem['ACTION'] !== NULL):?>
            <div data-img="<?=$arItem['IMAGE']?>" class="b-gallery__cnt-wrap">
                <a href="<?=$arItem['ACTION']['LINK'];?>"
                   class="b-gallery__cnt">
                    <div class="b-gallery__propose">
                        <div class="b-gallery__btn b-btn"><?=$arItem['ACTION']['TYPE'];?></div>
                        <div class="b-gallery__propose-cnt">
                            <div class="b-gallery__ttl"><?=$arItem['ACTION']['TITLE'];?></div>
                            <div class="b-gallery__txt"><?=$arItem['ACTION']['TEXT'];?></div>
                        </div>
                    </div>
                </a>
            </div>
            <?else:?>
            <?if($arItem['PREVIEW_TEXT'] != ''):?>
            <div
            <?if($arItem['IMAGE'] !== null):?> style="background-image:
            url('<?=$arItem['IMAGE'];?>');"<?endif;?> class="b-cafe-gallery">
            <div class="b-cafe-gallery__border">
                <div class="b-cafe-gallery__cnt<?=($arItem['THEME_BLACK'] ? ' b-cafe-gallery__cnt_theme_black' : '');?>">
                    <?=$arItem['PREVIEW_TEXT'];?>
                </div>
            </div>
        </div>
        <?else:?>
        <a href="<?=$arItem['IMAGE'];?>"></a>
        <?endif;?>
        <?endif;?>
        <?endforeach;?>
    </div>
    <a href="javascript:;"
       class="j-gallery__prev b-gallery__arrow b-gallery__arrow_show_prev">Показать
        предыдущий слайд</a>
    <a href="javascript:;"
       class="j-gallery__next b-gallery__arrow b-gallery__arrow_show_next">Показать
        следущий слайд</a>
</div>
<?else:?>
<div<?if($arResult['ITEMS'][0]['IMAGE'] !== null):?> style="background-image: url('<?=$arResult['ITEMS'][0]['IMAGE'];?>');"<?endif;?> class="b-cafe-gallery">
    <div class="b-cafe-gallery__border">
    <div class="b-cafe-gallery__cnt<?=($arResult['ITEMS'][0]['THEME_BLACK'] ? ' b-cafe-gallery__cnt_theme_black' : '');?>">
        <?=$arResult['ITEMS'][0]['PREVIEW_TEXT'];?>
    </div>
    </div>
    </div>
<?endif;?>
</div>
<?else:?>
<?php $APPLICATION->ShowViewContent('header_element_logo'); ?>

<?endif;?>
