<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$this->__template->SetViewTarget("header_element_logo");?>
<div class="l-header__gallery">
	<div style="background-image: url('<?=$arResult['DETAIL_PICTURE']['SRC']?>');" class="b-cafe-gallery">
		<div class="b-cafe-gallery__border">
			<div class="b-cafe-gallery__cnt">
				<h2 class="b-cafe-gallery__ttl"><?=$arResult['NAME'];?></h2>
				<div class="b-cafe-gallery__txt"><?=$arResult['DETAIL_TEXT'];?>
				</div>
			</div>
		</div>
	</div>
</div>
<?$this->__template->EndViewTarget();?>