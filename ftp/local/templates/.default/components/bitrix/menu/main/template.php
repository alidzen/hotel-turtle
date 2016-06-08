<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<nav class="b-nav<?if($arParams['POPUP'] == 'Y'):?> b-nav_theme_popup<?endif;?>">
	<ul class="b-nav__list">
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li class="b-nav__item">
			<a href="<?=$arItem["LINK"]?>" class="b-nav__link is-active b-nav__link">
				<?=$arItem["TEXT"]?>
				<div class="b-nav__link-line"></div>
			</a>
		</li>
	<?else:?>
		<li class="b-nav__item">
			<a href="<?=$arItem["LINK"]?>" class="b-nav__link b-nav__link">
				<?=$arItem["TEXT"]?>
				<div class="b-nav__link-line"></div>
			</a>
		</li>
	<?endif?>

<?endforeach?>
	</ul>
</nav>
<?endif?>