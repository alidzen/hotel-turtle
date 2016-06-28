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
		<div class="l-booking-rooms__item">
			<div class="b-room">
				<a href="#room-popup" data-fullsize data-toggle-time="300" class="b-room__cnt-link j-popup"></a>
				<div class="b-room__border">
					<div class="b-room__img-wrap">
						<div style="background-image: url('/img/room-1.jpg')" class="b-room__img"></div>
					</div>
					<div class="b-room__cnt">
						<div class="b-room__cnt-wrap">
							<div class="b-room__ttl">Стандартный одноместный номер</div>
							<div class="b-room__descr">идеально для путешественников</div>
							<div class="b-room__booking"> <span class="b-room__time">от</span>  <span class="b-room__price">5 400 <span class="b-ruble">g</span></span> <span class="b-room__time">
                            до</span> <span class="b-room__price">7 400 <span class="b-ruble">g</span></span>
							</div>
							<div class="b-room__btn"><a href="#room-popup" data-fullsize data-toggle-time="300" class="b-btn b-btn_width_auto b-btn_bg_white j-popup">Забронировать</a></div>
						</div>
					</div>
				</div>
			</div>
			<div id="room-popup" class="mfp-hide b-popup"><a href="javascript:;" title="Закрыть" class="b-popup__close">×</a>
				<div class="b-popup__cnt">
					<div class="l-room-popup j-gallery-container">
						<div class="l-room-popup__cnt">
							<div class="l-room-popup__header">
								<h2 class="f-ttl-smaller">Стандартный одноместный номер</h2>
								<div class="f-ttl-caption">Идеально для путешественника</div>
							</div>
							<div class="l-room-popup__param">
								<div class="b-room-param">
									<div class="b-room-param__txt">Площадь номера</div>
									<div class="b-room-param__data">13 м<sup>2</sup></div>
								</div>
								<div class="b-room-param">
									<div class="b-room-param__txt">Кровати</div>
									<div class="b-room-param__data">1 односпальная кровать</div>
								</div>
								<div class="b-room-param">
									<div class="b-room-param__txt">Максимальное количество гостей</div>
									<div class="b-room-param__data">1</div>
								</div>
							</div>
							<div class="l-room-popup__feature">
								<ul class="b-room-list">
									<li class="b-room-list__item">
										<div class="b-room-list__item-img b-room-list__item-img_img_window"></div>
										<div class="b-room-list__item-txt">Мансардные окна</div>
									</li>
									<li class="b-room-list__item">
										<div class="b-room-list__item-img b-room-list__item-img_img_fan"></div>
										<div class="b-room-list__item-txt">Кондиционер</div>
									</li>
									<li class="b-room-list__item">
										<div class="b-room-list__item-img b-room-list__item-img_img_wi-fi"></div>
										<div class="b-room-list__item-txt">Бесплатный Wi-Fi</div>
									</li>
								</ul>
							</div>
							<div class="l-room-popup__list-row b-typo-reset">
								<div class="l-room-popup__list-col">
									<ul>
										<li>Мини-бар</li>
										<li>Тапочки, халат и полотенце</li>
										<li>Сейф</li>
									</ul>
								</div>
								<div class="l-room-popup__list-col">
									<ul>
										<li>Фен</li>
										<li>Телефон</li>
										<li>Услуга «звонок-будильник»</li>
									</ul>
								</div>
							</div>
							<div class="l-room-popup__param l-room-popup__param_theme_price">
								<div class="b-room-param">
									<div class="b-room-param__txt">Стоимость</div>
									<div class="b-room-param__data">от 5 800 <span class="b-ruble">g</span> до 10 900 <span class="b-ruble">g</span></div>
								</div>
							</div>
						</div>
						<div class="l-room-popup__gallery">
							<div class="b-gallery b-gallery_theme_room j-gallery j-gallery_theme_mobile j-gallery_theme_tablet">
								<div data-height="650" data-width="100%" data-arrows="false" data-nav="thumbs" data-fit="cover" data-loop="true" data-autoplay="false" data-transition="dissolve" data-transitionduration="600" data-thumbwidth="100"
									 class="b-gallery__base">
									<a href="/img/home-gallery/gallery-1.jpg"></a>
									<a href="/img/home-gallery/IMG_8779ready.jpg"></a>
									<a href="/img/home-gallery/IMG_8828ready.jpg"></a>
									<a href="/img/home-gallery/IMG_8892ready.jpg"></a>
								</div><a href="javascript:;" class="j-gallery__prev b-gallery__arrow b-gallery__arrow_show_prev">Показать предыдущий слайд</a><a href="javascript:;" class="j-gallery__next b-gallery__arrow b-gallery__arrow_show_next">Показать следущий слайд</a>
								<a
										href="#gallery-popup-fs" class="b-gallery__fs j-popup"></a>
							</div>
							<div id="gallery-popup-fs" class="mfp-hide b-popup"><a href="javascript:;" title="Закрыть" class="b-popup__close">×</a>
								<div class="b-popup__cnt">
									<div class="b-gallery j-gallery">
										<div data-height="100%" data-width="100%" data-arrows="false" data-nav="thumbs" data-fit="cover" data-loop="true" data-autoplay="false" data-transition="dissolve" data-transitionduration="600"
											 data-thumbwidth="100" class="b-gallery__base">
											<a href="/img/home-gallery/gallery-1.jpg"></a>
											<a href="/img/home-gallery/IMG_8779ready.jpg"></a>
											<a href="/img/home-gallery/IMG_8828ready.jpg"></a>
											<a href="/img/home-gallery/IMG_8892ready.jpg"></a>
										</div><a href="javascript:;" class="j-gallery__prev b-gallery__arrow b-gallery__arrow_show_prev">Показать предыдущий слайд</a><a href="javascript:;" class="j-gallery__next b-gallery__arrow b-gallery__arrow_show_next">Показать следущий слайд</a>                                                                </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
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
