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
			<section class="l-article l-limit-wrap no-padding" id="actions-block">
				<div class="l-article__cnt">
					<div class="b-card">
						<div class="b-card__border">
							<div class="b-card__cnt">
								<div class="b-card__header">
									<div class="b-card__ttl-note"><?=$arItem['PROPERTIES']['SUB_NAME']['VALUE'];?></div>
									<h1 class="b-card__ttl"><?=$arItem['NAME'];?></h1>
							</div>
								<div class="b-card__descr">
								<p><?=$arItem['PREVIEW_TEXT'];?></p>
								</div>
								<!--<a href="<?=$arItem['DETAIL_PAGE_URL'];?>"
								   class="b-card__link"><?=GetMessage('READ_MORE');?></a>-->
							</div>
							<div class="b-card__gallery">
								<div style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC'];?>')"
									 class="b-card__gallery-img"></div>
							</div>
					</div>
				</div>
			</div>
		</section>
		<?else:?>
			<section class="l-article l-limit-wrap no-padding" id="actions-block">
				<div class="l-article__cnt">
					<div class="b-card">
						<div class="b-card__border">
							<div class="b-card__cnt">
								<div class="b-card__header">
									<div class="b-card__ttl-note"><?=$arItem['PROPERTIES']['SUB_NAME']['VALUE'];?></div>
									<h1 class="b-card__ttl"><?=$arItem['NAME'];?></h1>
							</div>
								<div class="b-card__descr">
									<p><?=$arItem['PREVIEW_TEXT'];?></p>
							</div>
								<? /*<a href="<?=$arItem['DETAIL_PAGE_URL'];?>" class="b-card__link"><?=GetMessage('READ_MORE');?></a>*/ ?>
							</div>
							<div class="b-card__gallery">
								<div style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC'];?>')"
									 class="b-card__gallery-img"></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?endif;?>
	<?endforeach;?>
<?endif;?>
