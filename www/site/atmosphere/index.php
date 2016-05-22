<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Атмосфера");
?><section class="l-article l-limit-wrap no-padding">
<div class="l-article__cnt">
	<div class="b-card">
		<div class="b-card__border">
			<div class="b-card__cnt">
				<div class="b-card__header">
					<h1 class="b-card__ttl">
					<?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/atmosphere-location-title.php',
								Array(),
								Array('MODE' => 'html')
							);?> </h1>
				</div>
				<div class="b-card__descr">
					 <?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/atmosphere-location-text.php',
							Array(),
							Array('MODE' => 'html')
						);?>
				</div>
			</div>
 <a href="/restaurant/" class="b-card__gallery">
			<div style="background-image: url('/local/assets/img/atmosphere-bg-2.jpg');" class="b-card__gallery-img">
			</div>
 </a>
		</div>
	</div>
</div>
 </section>
<!-- old variant-->
<!--<section style="background-image: url('/local/assets/img/atmosphere-bg-3.jpg');" class="l-showcase-full">
<div class="l-showcase-full__border">
	<div class="l-showcase-full__row">
		<div class="l-showcase-full__cnt">
			<div class="b-showcase-full">
				<div class="b-showcase-full__quotes">
					 <?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/atmosphere-quote-text.php',
							Array(),
							Array('MODE' => 'html')
						);?>
				</div>
				<div class="b-showcase-full__author">
					 <?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/atmosphere-quote-author.php',
							Array(),
							Array('MODE' => 'html')
						);?>
				</div>
			</div>
		</div>
	</div>
</div>
 </section>-->
<section class="l-services">
	<div class="l-services__tiles l-limit-wrap no-padding">
		<div class="l-services__tile l-services__tile_numb_9">
			<div class="b-service">
				<div class="b-service__header">
					<div class="b-service__ttl-note">Петербург уже давно<br/> описан, а что не описано,<br/> то надо видеть самому.</div>
				</div>
				<p>И. Гончаров</p>
				<div class="b-service__img-wrap">
					<div style="background-image: url('/local/assets/img/services/service-7.jpg');" class="b-service__img"></div>
				</div>
			</div>
		</div>
		<div class="l-services__tile l-services__tile_numb_10">
			<div class="b-service has-lines">
				<div class="b-service__border">
					<div class="b-service__header">
						<div class="b-service__ttl-note">Пушкин. Тютчев. Некрасов. Блок.<br/>Ахматова. Мандельштам…<br/>Это всё — псевдонимы. <br/> Автор — Петербург..</div>
					</div>
					<p>Л. Чуковская</p>
				</div>
				<div class="b-service__img-wrap">
					<div style="background-image: url('/local/assets/img/services/service-8.jpg');" class="b-service__img"></div>
				</div>
			</div>
		</div>
		<div class="l-services__tile l-services__tile_numb_11">
			<div class="b-service">
				<div class="b-service__header">
					<div class="b-service__ttl-note">Чего ловить в Петербурге — не очень  понятно. Это не скажешь словами. Это либо чувствуешь всей кожей, либо никогда не объяснишь, о чем речь.</div>
				</div>
				<p>И. Стогoff</p>
				<div class="b-service__img-wrap">
					<div style="background-image: url('/local/assets/img/services/service-9.jpg');" class="b-service__img"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="l-showcase l-showcase_theme_img-bg">
<div class="l-showcase__descr">
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
			Array(
				"CODE" => "atmosphere"
			),
			false
		);?>
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
 <a href="/rooms/" class="b-btn b-btn_width_auto">
			<?$APPLICATION->IncludeFile(
					'/local/area/' . LANGUAGE_ID . '/atmosphere-propose-btn-text.php',
					Array(),
					Array('MODE' => 'html')
				);?> </a>
		</div>
	</div>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
