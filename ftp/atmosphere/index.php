<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Атмосфера");
?>
<section class="l-article l-limit-wrap no-padding">
<div class="l-article__cnt">
	<div class="b-card b-card_theme_gallery j-gallery-container">
		<div class="b-card__border">
			<div class="b-card__cnt">
				<div class="b-card__header">
					<h1 class="b-card__ttl">
					<?$APPLICATION->IncludeFile('/local/area/'.LANGUAGE_ID.'/atmosphere-location-title.php', Array(), Array('MODE' => 'html')); ?>
					</h1>
					<div class="b-card__ttl-note">
						<? $APPLICATION->IncludeFile('/local/area/'.LANGUAGE_ID.'/atmosphere-location-sub-title.php', Array(), Array('MODE' => 'html')); ?>
					</div>
				</div>
				<div class="b-card__descr">
					 <?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/atmosphere-location-text.php',
							Array(),
							Array('MODE' => 'html')
						);?>
					<br>
					<a href="#popup-map-common" class="b-btn b-btn_width_auto j-map-popup">
						<? $APPLICATION->IncludeFile('/local/area/'.LANGUAGE_ID.'/global-look-on-the-map-text.php', Array(), Array('MODE' => 'text')); ?>
					</a>
				</div>
			</div>
				 <div class="b-card__gallery">
					 <? $APPLICATION->IncludeComponent("olympia:blank", "b-galery", Array("CODE" => "atmosphere", "HEIGHT" => "750"), false); ?>
				</div>
			 </div>
		</div>
	</div>
 </section>
<? $APPLICATION->IncludeComponent("bitrix:news.list", "quotes", Array("ACTIVE_DATE_FORMAT" => "d.m.Y", "ADD_SECTIONS_CHAIN" => "N", "AJAX_MODE" => "N", "AJAX_OPTION_ADDITIONAL" => "", "AJAX_OPTION_HISTORY" => "N", "AJAX_OPTION_JUMP" => "N", "AJAX_OPTION_STYLE" => "Y", "CACHE_FILTER" => "N", "CACHE_GROUPS" => "Y", "CACHE_TIME" => "36000000", "CACHE_TYPE" => "A", "CHECK_DATES" => "Y", "DETAIL_URL" => "", "DISPLAY_BOTTOM_PAGER" => "N", "DISPLAY_DATE" => "N", "DISPLAY_NAME" => "N", "DISPLAY_PICTURE" => "N", "DISPLAY_PREVIEW_TEXT" => "N", "DISPLAY_TOP_PAGER" => "N", "FIELD_CODE" => array("", ""), "FILTER_NAME" => "", "HIDE_LINK_WHEN_NO_DETAIL" => "N", "IBLOCK_ID" => "7", "IBLOCK_TYPE" => "CONTENT", "INCLUDE_IBLOCK_INTO_CHAIN" => "N", "INCLUDE_SUBSECTIONS" => "N", "MESSAGE_404" => "", "NEWS_COUNT" => "20", "PAGER_BASE_LINK_ENABLE" => "N", "PAGER_DESC_NUMBERING" => "N", "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000", "PAGER_SHOW_ALL" => "N", "PAGER_SHOW_ALWAYS" => "N", "PAGER_TEMPLATE" => ".default", "PAGER_TITLE" => "Новости", "PARENT_SECTION" => "", "PARENT_SECTION_CODE" => "", "PREVIEW_TRUNCATE_LEN" => "", "PROPERTY_CODE" => array("", ""), "SET_BROWSER_TITLE" => "N", "SET_LAST_MODIFIED" => "N", "SET_META_DESCRIPTION" => "N", "SET_META_KEYWORDS" => "N", "SET_STATUS_404" => "N", "SET_TITLE" => "N", "SHOW_404" => "N", "SORT_BY1" => "SORT", "SORT_BY2" => "ACTIVE_FROM", "SORT_ORDER1" => "ASC", "SORT_ORDER2" => "DESC")); ?>
<section class="l-showcase__inner-row">
	<div class="l-showcase l-showcase_theme_img-bg border-vertical j-gallery-container">
	<div class="l-showcase__descr border-horizontal">
		<div class="b-showcase b-showcase_theme_atmosphere">
			<div class="b-showcase__cnt">
				<div class="b-showcase__header">
					<h1 class="b-showcase__ttl">
						<?$APPLICATION->IncludeFile(
						'/local/area/' . LANGUAGE_ID . '/atmosphere-showcase-ttl.php',
						Array(),
						Array('MODE' => 'html')
						);?> </h1>
					<div class="b-showcase__ttl-note">
						<?$APPLICATION->IncludeFile(
						'/local/area/' . LANGUAGE_ID . '/atmosphere-showcase-ttl-ext.php',
						Array(),
						Array('MODE' => 'html')
						);?>
					</div>
				</div>
				<p>
					<?$APPLICATION->IncludeFile(
					'/local/area/' . LANGUAGE_ID . '/atmosphere-showcase-text.php',
					Array(),
					Array('MODE' => 'html')
					);?>
				</p>
				<div class="b-typo-reset">
					<?$APPLICATION->IncludeFile(
					'/local/area/' . LANGUAGE_ID . '/atmosphere-showcase-list.php',
					Array(),
					Array('MODE' => 'html')
					);?>
				</div>
			</div>
		</div>
	</div>
	<div class="l-showcase__gallery">
		<?$APPLICATION->IncludeComponent(
		"olympia:blank",
		"show-case.gallery",
		Array("CODE" => "atmosphere-bottom"
		),
		false
		);?>
	</div>
	</div>
</section>
<section class="l-article l-limit-wrap no-padding">
<div class="l-article__cnt">
	<div class="b-article b-article__theme_atmosphere-page">
		<div class="b-article__border b-article__border_scheme_3">
			<div class="b-article__img-wrap">
				<img alt="Зарисовка часов" src="/local/assets/img/atmosphere-bg-1.svg">
			</div>
 <article class="b-article__cnt">
			<div class="b-article__header">
				<div class="b-article__ttl-note">
					 <?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/atmosphere-always-ttl.php',
								Array(),
								Array('MODE' => 'html')
							);?>
				</div>
			</div>
			<p>
				 <?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/atmosphere-always-text.php',
							Array(),
							Array('MODE' => 'html')
						);?>
			</p>
 </article>
		</div>
	</div>
</div>
 </section>
<div class="l-propose">
	<div class="b-propose">
		<div class="b-propose__ttl">
			 <?$APPLICATION->IncludeFile(
				'/local/area/' . LANGUAGE_ID . '/atmosphere-propose-ttl.php',
				Array(),
				Array('MODE' => 'html')
			);?>
		</div>
		<div class="b-propose__btn">
 <a href="/rooms/" class="b-btn b-btn_width_auto b-btn_text_sise_2">
			<?$APPLICATION->IncludeFile(
					'/local/area/' . LANGUAGE_ID . '/atmosphere-propose-btn-text.php',
					Array(),
					Array('MODE' => 'html')
				);?> </a>
		</div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
