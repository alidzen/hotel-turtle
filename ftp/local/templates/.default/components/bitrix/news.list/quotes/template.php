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
<section class="l-services">
	<div class="l-services__tiles l-limit-wrap no-padding">
		<?foreach($arResult['ITEMS'] as $i => $arItem):?>
			<?if($i == 0):?>
				<div class="l-services__tile l-services__tile_numb_9">
					<div class="b-service">
						<div class="b-service__header">
							<div class="b-service__ttl-note b-service__ttl-note_font-size_small">
								<?=$arItem['PREVIEW_TEXT'];?>
							</div>
						</div>
						<p>
							<?=$arItem['NAME'];?>
						</p>
						<div class="b-service__img-wrap">
							<div style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC'];?>');" class="b-service__img">
							</div>
						</div>
					</div>
				</div>
			<?elseif($i == 1):?>
				<div class="l-services__tile l-services__tile_numb_10">
					<div class="b-service has-lines">
						<div class="b-service__border">
							<div class="b-service__header">
								<div class="b-service__ttl-note b-service__ttl-note_font-size_small">
									<?=$arItem['PREVIEW_TEXT'];?>
								</div>
							</div>
							<p>
								<?=$arItem['NAME'];?>
							</p>
						</div>
						<div class="b-service__img-wrap">
							<div style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC'];?>');" class="b-service__img">
							</div>
						</div>
					</div>
				</div>
			<?else:?>
				<div class="l-services__tile l-services__tile_numb_11 hide-on-tablet">
					<div class="b-service">
						<div class="b-service__header">
							<div class="b-service__ttl-note b-service__ttl-note_font-size_small">
								<?=$arItem['PREVIEW_TEXT'];?>
							</div>
						</div>
						<p>
							<?=$arItem['NAME'];?>
						</p>
						<div class="b-service__img-wrap">
							<div style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC'];?>');" class="b-service__img">
							</div>
						</div>
					</div>
				</div>
			<?endif;?>
		<?endforeach;?>
	</div>
</section>
<?endif;?>
