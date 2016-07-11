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
		<div class="l-services__tiles-row j-slider">
			<? $i = 0; ?>
			<? foreach ($arResult['ITEMS'] as $arItem): ?>
				<? if ($i == 0): ?>
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
								<div style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC'];?>');"
									 class="b-service__img">
								</div>
							</div>
						</div>
					</div>
				<? elseif ($i == 1): ?>
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
								<div style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC'];?>');"
									 class="b-service__img">
								</div>
							</div>
						</div>
					</div>
				<? elseif ($i == 2): ?>
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
								<div style="background-image: url('<?=$arItem['PREVIEW_PICTURE']['SRC'];?>');"
									 class="b-service__img">
								</div>
							</div>
						</div>
					</div>
				<? endif; ?>
				<? if ($i == 2)
					$i = 0; ?>
				<? $i++; ?>
			<? endforeach; ?>
		</div>
	</div>
	<div class="l-services__btn">
		<div class="b-propose">
			<div class="b-propose__btn">
				<a href="javascript:;" class="b-btn b-btn_width_auto b-btn_icon_rotate j-next-cite">
					<? $APPLICATION->IncludeFile(
						'/local/area/'.LANGUAGE_ID.'/global-other-quotes-text.php',
						[],
						['MODE' => 'html']
					); ?>
					<svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" viewbox="0 0 16 16" style="enable-background:new 0 0 16 16;" xml:space="preserve" width="512px" height="512px">
                        <g>
                          <path d="M2.083,9H0.062H0v5l1.481-1.361C2.932,14.673,5.311,16,8,16c4.08,0,7.446-3.054,7.938-7h-2.021   c-0.476,2.838-2.944,5-5.917,5c-2.106,0-3.96-1.086-5.03-2.729L5.441,9H2.083z" fill="#bca064"></path>
                          <path d="M8,0C3.92,0,0.554,3.054,0.062,7h2.021C2.559,4.162,5.027,2,8,2c2.169,0,4.07,1.151,5.124,2.876   L11,7h2h0.917h2.021H16V2l-1.432,1.432C13.123,1.357,10.72,0,8,0z" fill="#bca064"></path>
                        </g>
				  </svg>
				</a>
			</div>
		</div>
	</div>
</section>
<?endif;?>
