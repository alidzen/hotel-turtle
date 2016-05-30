<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<?$APPLICATION->IncludeComponent(
	"bitrix:map.google.view", 
	"contacts", 
	array(
		"CONTROLS" => array(
			0 => "SMALL_ZOOM_CONTROL",
			1 => "TYPECONTROL",
			2 => "SCALELINE",
		),
		"INIT_MAP_TYPE" => "ROADMAP",
		"MAP_DATA" => "a:4:{s:10:\"google_lat\";d:55.73994285973544;s:10:\"google_lon\";d:37.56576088867188;s:12:\"google_scale\";i:13;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:4:\"TEXT\";s:10:\"Отель\";s:3:\"LON\";d:30.346437692642212;s:3:\"LAT\";d:59.92354664791721;}}}",
		"MAP_HEIGHT" => "500",
		"MAP_ID" => "",
		"MAP_WIDTH" => "600",
		"OPTIONS" => array(
			0 => "ENABLE_SCROLL_ZOOM",
			1 => "ENABLE_DBLCLICK_ZOOM",
			2 => "ENABLE_DRAGGING",
			3 => "ENABLE_KEYBOARD",
		),
		"COMPONENT_TEMPLATE" => "contacts"
	),
	false
);?>

<div class="l-callback">
	<div class="l-callback__cnt">
		<div class="b-callback">
			<div class="b-callback__border">
				<div class="b-callback__cnt">
					<div class="b-callback__header">
						<h2 class="b-callback__ttl">Обратная связь</h2>
						<div class="b-callback__caption">задайте нам интересующий вас вопрос</div>
					</div>
					<form method="post" action="/local/ajax/callback-form.logic.php" data-message="Спасибо, что воспользовались данной услугой. Наш менеджер перезвонит в удобное для вас время." class="b-callback__form">
						<div class="b-callback__row">
							<input type="text" name="name" data-errormessage="Укажите ваше имя" placeholder="Ваше имя" required class="b-callback__input">
						</div>
						<div class="b-callback__row">
							<div class="b-callback__col">
								<input type="tel" name="tel" pattern="^[0-9-()+\s]+$" data-errormessage="Вы забыли оставить нам номер телефона" placeholder="Ваш телефон" autocomplete="tel" required class="b-callback__input">
							</div>
							<div class="b-callback__col">
								<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,3}$" data-errormessage="Вы забыли указать почту" placeholder="Ваш e-mail" autocomplete="email" required class="b-callback__input">
							</div>
						</div>
						<div class="b-callback__row">
							<div class="b-callback__descr">
								<textarea placeholder="Ваш вопрос" name="text" required class="b-callback__textarea"></textarea>
							</div>
						</div>
						<div class="b-callback__row">
							<div class="b-callback__btn">
								<input type="submit" value="Отправить" class="b-btn b-btn_width_auto">
							</div>
						</div>
					</form>
					<div class="j-callback-form__message"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
