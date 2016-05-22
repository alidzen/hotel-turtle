<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

$isRoomsDir = ($APPLICATION->GetCurDir() == '/rooms/');
?>

<?if(count($arResult['ITEMS'])):?>
<section class="l-booking-rooms<?if($isRoomsDir):?> has-no-margin<?endif;?>">
	<?if($isRoomsDir):?>
		<div class="l-services__header l-limit-wrap">
			<div class="l-services__row">
				<div class="b-article">
					<div class="b-feature__header">
						<h1 class="b-feature__ttl">Наши номера</h1> </div>
				</div>
			</div>
		</div>
	<?endif;?>
	<div class="l-booking-rooms__row">
		<?foreach($arResult['ITEMS'] as $arItem):?>
		<div class="l-booking-rooms__item">
			<div class="b-room">
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="b-room__cnt-link"></a>
				<div class="b-room__border">
					<?if($arItem['PROPERTIES']['ACTION']['VALUE'] != ''):?>
					<div class="b-room__specials b-btn b-btn_width_auto <?=$arItem['PROPERTIES']['ACTION']['VALUE_XML_ID'];?>"><?=$arItem['PROPERTIES']['ACTION']['VALUE']?></div>
					<?endif;?>
					<div class="b-room__img-wrap">
						<div style="background-image: url('<?=$arItem['FIELDS']['PREVIEW_PICTURE']['SRC'];?>')" class="b-room__img"></div>
					</div>
					<div class="b-room__cnt">
						<div class="b-room__cnt-wrap">
							<div class="b-room__ttl"><?=$arItem['FIELDS']['NAME'];?></div>
							<div class="b-room__descr"><?=$arItem['PROPERTIES']['SUB_NAME']['VALUE'];?></div>
							<div class="b-room__booking">
								<?if($arItem['PROPERTIES']['NOT_VACANT']['VALUE'] == 'Y'):?>
								<div class="b-room__message">Нет свободных номеров</div>
								<?else:?>
									<?if($arItem['PROPERTIES']['PRICE_FROM']['VALUE'] != ''):?>
										<?if($arItem['PROPERTIES']['PRICE_TO']['VALUE'] != ''):?>
											<span class="b-room__time">от</span>&nbsp; <span class="b-room__price"><?=$arItem['PROPERTIES']['PRICE_FROM']['VALUE'];?> <span class="b-ruble">g</span></span>&nbsp;
											<span class="b-room__time">до</span>&nbsp;<span class="b-room__price"><?=$arItem['PROPERTIES']['PRICE_TO']['VALUE'];?> <span class="b-ruble">g</span></span>
											<?if($arItem['PROPERTIES']['FOR']['VALUE'] != ''):?>
												<span class="b-room__time">&nbsp;<?=$arItem['PROPERTIES']['FOR']['VALUE'];?></span>
											<?endif;?>
										<?else:?>
											<span class="b-room__price">
												<?=$arItem['PROPERTIES']['PRICE_FROM']['VALUE'];?> <span class="b-ruble">g</span>
												<?if($arItem['PROPERTIES']['OLD_PRICE']['VALUE'] != ''):?>
													<span class="b-room__old-price"><?=$arItem['PROPERTIES']['OLD_PRICE']['VALUE'];?><span class="b-ruble">g</span></span>
												<?endif;?>
											</span>
								            <?if($arItem['PROPERTIES']['FOR']['VALUE'] != ''):?>
												<span class="b-room__time">&nbsp;<?=$arItem['PROPERTIES']['FOR']['VALUE'];?></span>
											<?endif;?>
										<?endif;?>
									<?endif;?>
								<?endif;?>
							</div>
							<?/*<div class="b-room__btn"><a href="#" class="b-btn b-btn_width_auto b-btn_bg_white">Забронировать</a></div>*/?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?endforeach;?>
	</div>
</section>
<?endif;?>