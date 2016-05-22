<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?if(count($arResult['ITEMS'])):?>
	<?foreach($arResult['ITEMS'] as $i => $arItem):?>
		<?if($i%2):?>
		<section class="l-actions-showcase">
			<div style="background-color: #b17d0c;" class="l-actions-showcase__row l-actions-showcase__row_theme_big-img">
				<a href="<?=$arItem['DETAIL_PAGE_URL'];?>" class="l-actions-showcase__img"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>" alt="<?=$arItem['NAME'];?>"></a>
				<div class="l-actions-showcase__cnt">
					<div class="b-actions-showcase">
						<div class="b-actions-showcase__cnt">
							<div class="b-actions-showcase__header">
								<div class="b-actions-showcase__ttl"><?=$arItem['NAME'];?></div>
								<div class="b-actions-showcase__ttl-note"><?=$arItem['PROPERTIES']['SUB_NAME']['VALUE'];?></div>
							</div>
							<div class="b-actions-showcase__descr">
								<p><?=$arItem['PREVIEW_TEXT'];?></p>
							</div><a href="<?=$arItem['DETAIL_PAGE_URL'];?>" class="b-actions-showcase__link">Подробнее</a> </div>
					</div>
				</div>
			</div>
		</section>
		<?else:?>
		<section class="l-actions-showcase">
			<div class="l-actions-showcase__row">
				<div class="l-actions-showcase__cnt">
					<div class="b-actions-showcase">
						<div class="b-actions-showcase__cnt">
							<div class="b-actions-showcase__header">
								<div class="b-actions-showcase__ttl"><?=$arItem['NAME'];?></div>
								<div class="b-actions-showcase__ttl-note"><?=$arItem['PROPERTIES']['SUB_NAME']['VALUE'];?></div>
							</div>
							<div class="b-actions-showcase__descr">
								<?=$arItem['PREVIEW_TEXT'];?>
							</div>
							<a href="<?=$arItem['DETAIL_PAGE_URL'];?>" class="b-actions-showcase__link">Подробнее</a>
						</div>
					</div>
				</div>
				<a href="<?=$arItem['DETAIL_PAGE_URL'];?>" class="l-actions-showcase__img"><img src="<?=$arItem['PREVIEW_PICTURE']['SRC'];?>" alt="<?=$arItem['NAME'];?>"></a>
			</div>
		</section>
		<?endif;?>
	<?endforeach;?>
<?endif;?>
