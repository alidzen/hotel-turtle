<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
?><section class="l-article l-limit-wrap has-border">
<div class="l-article__cnt">
	<div class="b-article">
		<div class="b-article__border b-article__border_scheme_2">
			<div class="b-article__img-wrap">
 <img alt="Зарисовка дома Ф.М. Достоевского" src="/local/assets/img/feature-1.svg">
			</div>
 <article class="b-article__cnt">
			<div class="b-article__header">
				<div class="b-article__ttl-note">
					 <?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/sp-spirit-title.php',
								Array(),
								Array('MODE' => 'html')
							);?>
				</div>
				<h1 class="b-article__ttl">
				<?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/sp-spirit-title-ext.php',
								Array(),
								Array('MODE' => 'html')
							);?> </h1>
			</div>
			<p>
				 <?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/sp-spirit-about-text.php',
							Array(),
							Array('MODE' => 'html')
						);?>
			</p>
			<div class="b-article__btn">
 <a href="/atmosphere/" class="b-btn b-btn_width_auto b-btn_bg_gray">
				<?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/sp-spirit-about-link-text.php',
								Array(),
								Array('MODE' => 'text')
							);?> </a>
			</div>
 </article>
		</div>
	</div>
</div>
 </section> <section class="l-feature">
<div class="l-feature__cnt">
	<div class="b-feature">
		<div class="b-feature__img-wrap"><img src="/local/assets/img/inkpen.svg" alt="Пиьменные принадлежности"></div>
		<div class="b-feature__cnt">
			<div class="b-feature__header">
				<h1 class="b-feature__ttl">
				<?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/cr-title-text.php',
							Array(),
							Array('MODE' => 'html')
						);?> </h1>
				<div class="b-feature__ttl-note">
					 <?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/cr-title-text-ext.php',
							Array(),
							Array('MODE' => 'html')
						);?>
				</div>
			</div>
			 <?$APPLICATION->IncludeFile(
					'/local/area/' . LANGUAGE_ID . '/cr-feature-list-block.php',
					Array(),
					Array('MODE' => 'html')
				);?>
		</div>
	</div>
</div>
 </section>
<?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"rooms",
	Array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "rooms",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"XML_ID",3=>"NAME",4=>"TAGS",5=>"SORT",6=>"PREVIEW_TEXT",7=>"PREVIEW_PICTURE",8=>"DETAIL_TEXT",9=>"DETAIL_PICTURE",10=>"DATE_ACTIVE_FROM",11=>"ACTIVE_FROM",12=>"DATE_ACTIVE_TO",13=>"ACTIVE_TO",14=>"SHOW_COUNTER",15=>"SHOW_COUNTER_START",16=>"IBLOCK_TYPE_ID",17=>"IBLOCK_ID",18=>"IBLOCK_CODE",19=>"IBLOCK_NAME",20=>"IBLOCK_EXTERNAL_ID",21=>"DATE_CREATE",22=>"CREATED_BY",23=>"CREATED_USER_NAME",24=>"TIMESTAMP_X",25=>"MODIFIED_BY",26=>"USER_NAME",27=>"",),
		"DETAIL_PAGER_SHOW_ALL" => "N",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(0=>"ACTION",1=>"FOR_DAYS",2=>"P_MAX",3=>"SUB_NAME",4=>"NOT_VACANT",5=>"R_SIZE",6=>"SERVICES",7=>"PRICE_TO",8=>"PRICE_FROM",9=>"",),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "1",
		"IBLOCK_TYPE" => "ROOMS",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"XML_ID",3=>"NAME",4=>"TAGS",5=>"SORT",6=>"PREVIEW_TEXT",7=>"PREVIEW_PICTURE",8=>"DETAIL_TEXT",9=>"DETAIL_PICTURE",10=>"DATE_ACTIVE_FROM",11=>"ACTIVE_FROM",12=>"DATE_ACTIVE_TO",13=>"ACTIVE_TO",14=>"SHOW_COUNTER",15=>"SHOW_COUNTER_START",16=>"IBLOCK_TYPE_ID",17=>"IBLOCK_ID",18=>"IBLOCK_CODE",19=>"IBLOCK_NAME",20=>"IBLOCK_EXTERNAL_ID",21=>"DATE_CREATE",22=>"CREATED_BY",23=>"CREATED_USER_NAME",24=>"TIMESTAMP_X",25=>"MODIFIED_BY",26=>"USER_NAME",27=>"",),
		"LIST_PROPERTY_CODE" => array(0=>"ACTION",1=>"FOR_DAYS",2=>"P_MAX",3=>"SUB_NAME",4=>"NOT_VACANT",5=>"R_SIZE",6=>"SERVICES",7=>"PRICE_TO",8=>"PRICE_FROM",9=>"",),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/rooms/",
		"SEF_MODE" => "Y",
		"SEF_URL_TEMPLATES" => array("news"=>"/rooms/","section"=>"","detail"=>"#ELEMENT_CODE#/",),
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N"
	)
);?> <section class="l-article l-limit-wrap has-border">
<div class="l-article__cnt">
	<div class="b-article b-article_theme_gold">
		<div class="b-article__border b-article__border_scheme_1">
			<div class="b-article__img-wrap">
				<img alt="Зарисовка дома Ф.М. Достоевского" src="/local/assets/img/feature-2.svg">
			</div>
 <article class="b-article__cnt">
			<div class="b-article__header">
				<h1 class="b-article__ttl">
				<?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/article-title-text.php',
								Array(),
								Array('MODE' => 'html')
							);?> </h1>
				<div class="b-article__ttl-note">
					 <?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/article-title-text-ext.php',
								Array(),
								Array('MODE' => 'html')
							);?>
				</div>
			</div>
			 <?$APPLICATION->IncludeFile(
						'/local/area/' . LANGUAGE_ID . '/article-features-list-block.php',
						Array(),
						Array('MODE' => 'html')
					);?>
			<div class="b-article__btn">
 <a href="/atmosphere/" class="b-btn b-btn_width_auto b-btn_bg_gray">
				<?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/sp-spirit-about-link-text.php',
								Array(),
								Array('MODE' => 'text')
							);?> </a>
			</div>
 </article>
		</div>
	</div>
</div>
 </section> <section class="l-services">
<div class="l-services__header l-limit-wrap">
	<div class="l-services__row">
		<div class="b-article">
			<div class="b-feature__header">
				<h1 class="b-feature__ttl">
				<?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/services-title-text.php',
							Array(),
							Array('MODE' => 'html')
						);?> </h1>
				<div class="b-feature__ttl-note">
					 <?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/services-title-text-ext.php',
							Array(),
							Array('MODE' => 'html')
						);?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="l-services__tiles l-limit-wrap no-padding">
	<?$APPLICATION->IncludeFile(
		'/local/area/' . LANGUAGE_ID . '/main-services-list.php',
		Array(),
		Array('MODE' => 'html')
	);?>
 </section> <section class="l-article l-limit-wrap no-padding">
<div class="l-article__cnt">
	<div class="b-card">
		<div class="b-card__border">
			<div class="b-card__bg-img">
 <img src="/local/assets/img/card/card-1.svg" alt="Кувшин">
			</div>
			<div class="b-card__cnt">
				<div class="b-card__header">
					<div class="b-card__ttl-note">
						 <?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/restaurant-title-text.php',
								Array(),
								Array('MODE' => 'html')
							);?>
					</div>
					<h1 class="b-card__ttl">
					<?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/restaurant-title-text-ext.php',
								Array(),
								Array('MODE' => 'html')
							);?> </h1>
				</div>
				<div class="b-card__descr">
					<p>
						 <?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/restaurant-content-text.php',
								Array(),
								Array('MODE' => 'html')
							);?>
					</p>
				</div>
 <a href="/restaurant/" class="b-card__link">
				<?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/restaurant-more-link-text.php',
							Array(),
							Array('MODE' => 'html')
						);?> </a>
			</div>
 <a href="/restaurant/" class="b-card__gallery">
			<div style="background-image: url('/local/assets/img/card/card-1.jpg')" class="b-card__gallery-img">
			</div>
 </a>
		</div>
	</div>
</div>
 </section><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
