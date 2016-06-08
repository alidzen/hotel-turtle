<?if($arResult['ITEMS'] !== NULL):?>
<div class="l-header__gallery">
	<?if(count($arResult['ITEMS'])>1):?>
	<div class="b-gallery b-gallery_theme_home j-gallery">
		<div data-height="100%" data-width="100%" data-arrows="false" data-nav="dots" data-fit="cover" data-loop="true" data-autoplay="false" data-transition="dissolve" data-transitionduration="600" data-margin="-1" class="b-gallery__base">
			<?foreach($arResult['ITEMS'] as $arItem):?>
				<?if($arItem['ACTION'] !== NULL):?>
				<div data-img="<?=$arItem['IMAGE']?>" class="b-gallery__cnt-wrap">
					<div class="b-gallery__cnt">
						<div class="b-gallery__propose">
							<div class="b-gallery__btn b-btn"><?=$arItem['ACTION']['TYPE'];?></div>
							<div class="b-gallery__propose-cnt">
								<div class="b-gallery__ttl"><?=$arItem['ACTION']['TTL'];?></div>
								<div class="b-gallery__txt"><?=$arItem['ACTION']['TXT'];?></div>
							</div>
						</div>
					</div>
				</div>
				<?else:?>
					<?if($arItem['PREVIEW_TEXT'] != ''):?>
						<div<?if($arItem['IMAGE'] !== null):?> style="background-image: url('<?=$arItem['IMAGE'];?>');"<?endif;?> class="b-cafe-gallery">
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
		<a href="javascript:;" class="j-gallery__prev b-gallery__arrow b-gallery__arrow_show_prev">Показать предыдущий слайд</a>
		<a href="javascript:;" class="j-gallery__next b-gallery__arrow b-gallery__arrow_show_next">Показать следущий слайд</a>
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
<?endif;?>
