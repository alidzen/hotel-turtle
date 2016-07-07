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
$this->setFrameMode(false);
?>
<section class="l-action l-action_theme_room-item">
	<div class="l-action__row">
		<div class="l-action__border">
			<div class="l-action__cnt">
				<div class="l-action__ttl b-bottom-dash-pos-left">
					<? if ($arResult['PROPERTIES']['SUB_NAME']['VALUE'] != ''): ?>
						<div class="f-ttl-note"><?=$arResult['PROPERTIES']['SUB_NAME']['VALUE'];?></div>
					<? endif; ?>
				</div>
				<div class="l-room-item">
					<div class="l-room-item__params">
						<? if ($arResult['PROPERTIES']['R_SIZE']['VALUE'] != ''): ?>
							<div class="b-room-param">
								<div class="b-room-param__txt"><?=GetMessage('ROOM_SIZE_TEXT');?></div>
								<div class="b-room-param__data"><?=$arResult['PROPERTIES']['R_SIZE']['VALUE'];?>
									м<sup>2</sup></div>
						</div>
						<? endif; ?>
						<? if ($arResult['PROPERTIES']['BED']['VALUE'] != ''): ?>
							<div class="b-room-param">
								<div class="b-room-param__txt"><?=GetMessage('NUM_OF_BED');?></div>
								<div class="b-room-param__data"><?=$arResult['PROPERTIES']['BED']['VALUE'];?></div>
							</div>
						<? endif; ?>
						<? if ($arResult['PROPERTIES']['P_MAX']['VALUE'] != ''): ?>
							<div class="b-room-param">
								<div class="b-room-param__txt"><?=GetMessage('NUM_OF_GUESTS');?></div>
								<div class="b-room-param__data"><?=$arResult['PROPERTIES']['P_MAX']['VALUE'];?></div>
							</div>
						<? endif; ?>
					</div>
					<div class="l-room__feature">
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
					<? if (count($arResult['services'])): ?>
						<div class="l-room-item__list-row b-typo-reset">
							<? foreach ($arResult['services'] as $arCol): ?>
								<div class="l-room-item__list-col">
									<ul>
										<? foreach ($arCol as $strSname): ?>
											<li><?=$strSname;?></li>
										<? endforeach; ?>
									</ul>
						</div>
							<? endforeach; ?>
					</div>
					<? endif; ?>
					<div class="l-room-item__params l-room-item__params_theme_price">
						<div class="b-room-param">
							<div class="b-room-param__txt"><?=GetMessage('PRICE');?></div>
							<div class="b-room-param__data">
								<? if ($arResult['PROPERTIES']['PRICE_FROM']['VALUE'] != ''): ?>
									<? if ($arResult['PROPERTIES']['PRICE_TO']['VALUE'] != ''): ?>
										<?=GetMessage('FROM');?> <?=$arResult['PROPERTIES']['PRICE_FROM']['VALUE'];?> <span
											class="b-ruble">g</span>
										<?=GetMessage('TO');?> <?=$arResult['PROPERTIES']['PRICE_TO']['VALUE'];?>  <span
											class="b-ruble">g</span>
									<? else: ?>
										<?=$arResult['PROPERTIES']['PRICE_FROM']['VALUE'];?> <span
											class="b-ruble">g</span>
										<? if ($arResult['PROPERTIES']['OLD_PRICE']['VALUE'] != ''): ?>
											<span
												class="b-room__old-price"><?=$arResult['PROPERTIES']['OLD_PRICE']['VALUE'];?>
												<span class="b-ruble">g</span></span>
										<? endif; ?>
									<?endif;?>
								<? endif; ?>
							</div>
						</div>
					</div>
					<? if (count($arResult['galery']) > 0): ?>
						<div class="l-room-item__gallery">
							<div class="b-gallery b-gallery_theme_room j-gallery">
								<div data-height="650" data-width="100%" data-arrows="false" data-nav="thumbs"
									 data-fit="cover" data-loop="true" data-autoplay="false" data-transition="dissolve"
									 data-transitionduration="600" data-allowfullscreen="native" data-thumbwidth="100"
									 data-margin="-1" class="b-gallery__base">
									<? foreach ($arResult['galery'] as $arImage): ?>
										<a href="<?=$arImage['SRC']?>"></a>
									<? endforeach; ?>
							</div>
								<a href="javascript:;"
								   class="j-gallery__prev b-gallery__arrow b-gallery__arrow_show_prev">Показать
									предыдущий слайд</a>
								<a href="javascript:;"
								   class="j-gallery__next b-gallery__arrow b-gallery__arrow_show_next">Показать следущий
									слайд</a></div>
						</div>
					<? endif; ?>
					<? /*
					<div class="l-room-item__footer">
						<div class="l-room-item__img-wrap"><img src="/local/assets/img/room-item-1.svg" alt="Книги и бокал вина"></div>
						<div class="l-room-item__footer-propose">
							<div class="b-propose">
								<div class="b-propose__ttl">Вы готовы приехать к нам?</div>
								<div class="b-propose__btn">
									<a href="#" class="b-btn b-btn_width_auto">
									</a>
								</div>
							</div>
						</div>
					</div>*/ ?>
				</div>
			</div>
		</div>
	</div>
</section>