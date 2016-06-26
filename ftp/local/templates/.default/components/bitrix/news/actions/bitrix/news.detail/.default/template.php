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
<section class="l-action">
	<div class="l-action__row">
		<div class="l-action__border">
			<div class="l-action__cnt b-typo-reset">
				<div class="l-action__ttl is-color-green b-bottom-dash-pos-left">
					<h2 class="f-ttl"><?=$arResult['NAME'];?></h2>
					<div class="f-ttl-note"><?=$arResult['PROPERTIES']['SUB_NAME']['VALUE'];?></div>
				</div>
				<?=$arResult['DETAIL_TEXT'];?>
			</div>
		</div>
	</div>
</section>