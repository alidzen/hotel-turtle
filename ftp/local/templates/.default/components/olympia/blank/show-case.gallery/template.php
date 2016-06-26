<?if($arResult['ITEMS'] !== NULL):?>
	<div
		class="<?=(isset($arParams['CLASS_LIST']) ? $arParams['CLASS_LIST'] : 'b-gallery j-gallery j-gallery_theme_mobile');?>">
		<div data-minheight="100%>" data-width=""
			 data-arrows="false" data-nav="dots" data-fit="cover"
		 data-loop="true" data-autoplay="false" data-transition="dissolve" data-transitionduration="600"
		 data-margin="-1" class="b-gallery__base">
		<?foreach($arResult['ITEMS'] as $arImage):?>
		<a href="<?=$arImage['RESIZE_IMAGE']['src'];?>"></a>
		<?endforeach;?>
	</div>
	<a href="javascript:;" class="j-gallery__prev b-gallery__arrow b-gallery__arrow_show_prev">Показать предыдущий слайд</a>
	<a href="javascript:;" class="j-gallery__next b-gallery__arrow b-gallery__arrow_show_next">Показать следущий слайд</a>
</div>
<?endif;?>
