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
						<h1 class="b-feature__ttl"><?=GetMessage('H1_ROOMS');?></h1></div>
				</div>
			</div>
		</div>
	<?endif;?>
	<div class="l-booking-rooms__row">
		<?foreach($arResult['ITEMS'] as $arItem):?>
		<div class="l-booking-rooms__item">
			<div class="b-room">
				<a href="#<?=$arItem['CODE'];?>-item" data-toggle-time="300" class="b-room__cnt-link j-popup"></a>
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
									<div class="b-room__message"><?=GetMessage('NO_ROOMS');?></div>
								<?else:?>
									<?if($arItem['PROPERTIES']['PRICE_FROM']['VALUE'] != ''):?>
										<?if($arItem['PROPERTIES']['PRICE_TO']['VALUE'] != ''):?>
											<span class="b-room__time"><?=GetMessage('FROM');?></span>&nbsp; <span
												class="b-room__price"><?=$arItem['PROPERTIES']['PRICE_FROM']['VALUE'];?>
												<span class="b-ruble">g</span></span>&nbsp;
											<span class="b-room__time"><?=GetMessage('TO');?></span>&nbsp;<span
												class="b-room__price"><?=$arItem['PROPERTIES']['PRICE_TO']['VALUE'];?>
												<span class="b-ruble">g</span></span>
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
							<?/**<div class="b-room__btn"><a href="#<?=$arItem['CODE'];?>-item" data-toggle-time="300" class="b-btn b-btn_width_auto b-btn_bg_white j-popup">Забронировать</a></div>**/?>
						</div>
					</div>
				</div>
			</div>
			<div id="<?=$arItem['CODE'];?>-item" class="mfp-hide b-popup">
				<a href="javascript:;" title="Закрыть" class="b-popup__close">×</a>
				<div class="b-popup__cnt">
					<section class="l-action l-action_theme_room-item">
						<div class="l-action__row">
							<div class="l-action__border">
								<div class="l-action__cnt">
									<div class="l-action__ttl">
										<h2 class="f-callback-note b-bottom-dash-pos-left has_margin-small"><?=$arItem['FIELDS']['NAME'];?></h2>
										<div class="f-adaptive-txt"><?=$arItem['FIELDS']['DETAIL_TEXT'];?>
											<span class="b-price">
												<? if ($arItem['PROPERTIES']['PRICE_FROM']['VALUE'] != ''): ?>
												<? if ($arItem['PROPERTIES']['PRICE_TO']['VALUE'] != ''): ?>
												<?=GetMessage(
																'FROM'
															);?> <?=$arItem['PROPERTIES']['PRICE_FROM']['VALUE'];?><span
													class="b-ruble">g</span>
												<?=GetMessage(
																'TO'
															);?> <?=$arItem['PROPERTIES']['PRICE_TO']['VALUE'];?>  <span
													class="b-ruble">g</span>
												<? else: ?>
												<?=$arItem['PROPERTIES']['PRICE_FROM']['VALUE'];?> <span
													class="b-ruble">g</span>
												<? if ($arItem['PROPERTIES']['OLD_PRICE']['VALUE'] != ''): ?>
												<span
														class="b-room__old-price"><?=$arItem['PROPERTIES']['OLD_PRICE']['VALUE'];?>
													<span class="b-ruble">g</span></span>
												<? endif; ?>
												<? endif; ?>
												<? endif; ?>
											</span>
										</div>
									</div>

									<div class="l-room-item">
										<? if (count($arItem['galery']) > 0): ?>
										<div class="l-room-item__gallery">
											<div class="b-gallery b-gallery_theme_room j-gallery j-gallery_theme_mobile">
												<div data-ratio="16/9" data-width="100%" data-arrows="false" data-nav="thumbs"
													 data-fit="cover" data-loop="true" data-autoplay="false" data-transition="dissolve"
													 data-transitionduration="600" data-allowfullscreen="native" data-thumbwidth="100"
													 data-margin="-1" class="b-gallery__base">
													<? foreach ($arItem['galery'] as $arImage): ?>
													<a href="<?=$arImage['SRC']?>"></a>
													<? endforeach; ?>
												</div>
												<a href="javascript:;"
												   class="j-gallery__prev b-gallery__arrow b-gallery__arrow_show_prev">Показать
													предыдущий слайд</a>
												<a href="javascript:;"
												   class="j-gallery__next b-gallery__arrow b-gallery__arrow_show_next">Показать
													следущий
													слайд</a></div>
										</div>
										<? endif; ?>
										<div class="l-room-item__descr">
											<div class="l-room-item__params">
												<? if ($arItem['PROPERTIES']['R_SIZE']['VALUE'] != ''): ?>
													<div class="b-room-param"><?=GetMessage('ROOM_SIZE_TEXT');?>: 
														<span class="b-room-param__data"><?=$arItem['PROPERTIES']['R_SIZE']['VALUE'];?> м<sup>2</sup></span>
													</div>
												<?endif;?>
												<? if ($arItem['PROPERTIES']['BED']['VALUE'] != ''): ?>
													<div class="b-room-param"><?=GetMessage('NUM_OF_BED');?>: 
														<span class="b-room-param__data"><?=$arItem['PROPERTIES']['BED']['VALUE'];?></span>
													</div>
												<?endif;?>
												<? if ($arItem['PROPERTIES']['P_MAX']['VALUE'] != ''): ?>
													<div class="b-room-param"><?=GetMessage('NUM_OF_GUESTS');?>: 
														<span class="b-room-param__data"><?=$arItem['PROPERTIES']['P_MAX']['VALUE'];?></span>
													</div>
												<?endif;?>
											</div>
											<div class="l-room-item__feature">
												<ul class="b-room-list">
													<li class="b-room-list__item">
														<div class="b-room-list__item-img b-room-list__item-img_img_window"></div>
														<div class="b-room-list__item-txt"><?=GetMessage('MANSARDA');?></div>
													</li>
													<li class="b-room-list__item">
														<div class="b-room-list__item-img b-room-list__item-img_img_fan"></div>
														<div class="b-room-list__item-txt"><?=GetMessage('COND');?></div>
													</li>
													<li class="b-room-list__item">
														<div class="b-room-list__item-img b-room-list__item-img_img_wi-fi"></div>
														<div class="b-room-list__item-txt"><?=GetMessage('FREE_WIFI');?></div>
													</li>
												</ul>
											</div>
											<div class="l-room-item__hang">
												<ul class="b-room-hang">
													<? foreach ($arCol as $strSname): ?>
													<li><?=$strSname;?></li>
													<? endforeach; ?>
												</ul>
											</div>
											<div class="l-room-item__btn">
												<a href="#" class="b-btn b-btn_width_auto">Забронировать</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<?endforeach;?>
	</div>
</section>
<?endif;?>
