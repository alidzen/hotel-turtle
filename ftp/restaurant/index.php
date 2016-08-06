<?
define('WRAP_CLASS', 'is-stick');
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Ресторанный комплекс “Симпозиум” включает в себя литературное кафе, ресторан, лаунж и небольшой банкетный зал.");
$APPLICATION->SetPageProperty("keywords", "отель, бутик-отель, мини-отель, петербург, отели в классическом стиле, отели 3*, делюкс, комфорт, номера стандарт, акции отель, скидки отель");
$APPLICATION->SetTitle("Ресторанный комплекс “Симпозиум”");
?>
<section class="l-article l-limit-wrap has-border">
	<div class="l-article__cnt">
		<div class="b-article">
			<div class="b-article__border b-article__border_scheme_2">
				<div class="b-article__img-wrap"><img src="/local/assets/img/card/card-2.svg" alt="Кувшин"></div>
				<article class="b-article__cnt">
					<div class="b-article__header">
						<div class="b-article__ttl-note">
							<?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/restaurant-feature-headings.php',
							Array(),
							Array('MODE' => 'html')
							);?>
						</div>
					</div>
					<?$APPLICATION->IncludeFile(
						'/local/area/' . LANGUAGE_ID . '/restaurant-feature-txt.php',
						Array(),
						Array('MODE' => 'html')
						);?>
				</article>
			</div>
		</div>
	</div>
</section>
<section class="l-showcase__inner-row">
	<div class="l-showcase l-showcase_white_borders j-gallery-container">
		<div class="l-showcase__gallery l-showcase__gallery_dots_lower">
			<? $APPLICATION->IncludeComponent(
			"olympia:blank",
			"show-case.gallery",
			Array("CODE" => "rest"
			),
			false); ?>
			<a href="javascript:;" class="j-gallery__prev b-gallery__arrow b-gallery__arrow_show_prev">Показать
				предыдущий слайд</a>
			<a href="javascript:;" class="j-gallery__next b-gallery__arrow b-gallery__arrow_show_next">Показать
				следущий слайд</a>
		</div>
		<div class="l-showcase__descr ">
			<div class="b-showcase">
				<div class="b-showcase__cnt">
					<div class="b-showcase__header">
						<h1 class="b-showcase__ttl">
							<? $APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/restaurant-ttl-1.php',
							Array(),
							Array('MODE' => 'html')); ?>
						</h1>
						<div class="b-showcase__ttl-note">
							<? $APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/restaurant-ttl-1-ext.php',
							Array(),
							Array('MODE' => 'html')); ?>
						</div>
					</div>
					<? $APPLICATION->IncludeFile(
					'/local/area/' . LANGUAGE_ID . '/restaurant-text-1.php',
					Array(),
					Array('MODE' => 'html')); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
