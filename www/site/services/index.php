<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Дополнительные услуги");
?>

<?$APPLICATION->IncludeComponent(
	"olympia:blank",
	"inside-services",
	Array(),
	false
);?>

<section class="l-services">
	<div class="l-services__header l-limit-wrap">
		<div class="l-services__row">
			<div class="b-article">
				<div class="b-feature__header">
					<h1 class="b-feature__ttl">
						<?$APPLICATION->IncludeFile(
							'/local/area/' . LANGUAGE_ID . '/services-wwwu-title.php',
							Array(),
							Array('MODE' => 'html')
						);?>
					</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="l-services__tiles l-limit-wrap no-padding">
		<div class="l-services__tile l-services__tile_numb_14">
			<div class="b-service has-lines">
				<div class="b-service__border">
					<div class="b-service__cnt">
						<div class="b-service__header">
							<div class="b-service__ttl-note">
								<?$APPLICATION->IncludeFile(
									'/local/area/' . LANGUAGE_ID . '/services-wwwu-0-ttl.php',
									Array(),
									Array('MODE' => 'html')
								);?>
							</div>
						</div>
						<p>
							<?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/services-wwwu-0-txt.php',
								Array(),
								Array('MODE' => 'html')
							);?>
						</p>
					</div>
				</div>
				<div class="b-service__img-wrap">
					<div class="b-service__img"></div>
				</div>
			</div>
		</div>
		<div class="l-services__tile l-services__tile_numb_15">
			<div class="b-service has-lines">
				<div class="b-service__border">
					<div class="b-service__cnt">
						<div class="b-service__header">
							<div class="b-service__ttl-note">
								<?$APPLICATION->IncludeFile(
									'/local/area/' . LANGUAGE_ID . '/services-wwwu-1-ttl.php',
									Array(),
									Array('MODE' => 'html')
								);?>
							</div>
						</div>
						<p>
							<?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/services-wwwu-1-txt.php',
								Array(),
								Array('MODE' => 'html')
							);?>
						</p>
					</div>
				</div>
				<div class="b-service__img-wrap">
					<div class="b-service__img"></div>
				</div>
			</div>
		</div>
		<div class="l-services__tile l-services__tile_numb_16">
			<div class="b-service">
				<div class="b-service__border">
					<div class="b-service__cnt">
						<div class="b-service__header">
							<div class="b-service__ttl-note">
								<?$APPLICATION->IncludeFile(
									'/local/area/' . LANGUAGE_ID . '/services-wwwu-2-ttl.php',
									Array(),
									Array('MODE' => 'html')
								);?>
							</div>
						</div>
						<p>
							<?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/services-wwwu-2-txt.php',
								Array(),
								Array('MODE' => 'html')
							);?>
						</p>
						<a href="http://brain-games.ru" target="_blank" class="b-service__link">brain-games.ru</a>
					</div>
					<div class="b-service__img-wrap">
						<div class="b-service__img"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="l-services__tile l-services__tile_numb_17">
			<div class="b-service has-lines">
				<div class="b-service__border">
					<div class="b-service__cnt">
						<div class="b-service__header">
							<div class="b-service__ttl-note">
								<?$APPLICATION->IncludeFile(
									'/local/area/' . LANGUAGE_ID . '/services-wwwu-3-ttl.php',
									Array(),
									Array('MODE' => 'html')
								);?>
							</div>
						</div>
						<p>
							<?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/services-wwwu-3-txt.php',
								Array(),
								Array('MODE' => 'html')
							);?>
						</p>
					</div>
				</div>
				<div class="b-service__img-wrap">
					<div class="b-service__img"></div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- программинг -->
<div class="l-propose">
	<div class="b-propose">
		<div class="b-propose__ttl">Наш отель к вашим услугам.</div>
		<div class="b-propose__btn"><a href="#" class="b-btn b-btn_width_auto">Выбрать номер</a></div>
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
