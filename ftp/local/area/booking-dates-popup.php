<form action="" data-noinit data-message="Спасибо, что воспользовались данной услугой. Наш менеджер перезвонит в удобное для вас время." class="b-booking-form__form j-date-booking">
	<div class="b-booking-form__col"><input type="text"
											placeholder="<?=(LANGUAGE_ID == 'ru' ? 'Дата заезда' : 'Check-in date');?>"
											class="b-booking-from__inp j-date-inp j-date-from"></div>
	<div class="b-booking-form__col"><input type="text"
											placeholder="<?=(LANGUAGE_ID == 'ru' ? 'Дата отъезда' : 'Check-out date');?>"
											class="b-booking-to__inp j-date-inp j-date-to"></div>
	<div class="b-booking-form__col">
		<button type="submit" value="Номер"
				href="https://wubook.net/wbkd/wbk/?lcode=1442495155&dfrom=15/06/2016&dto=23/06/2016"
				class="b-btn b-btn_bg_white b-btn_text_sise_2 j-frame">
			<? $APPLICATION->IncludeFile('/local/area/'.LANGUAGE_ID.'/global-choose-room-text.php', Array(), Array('MODE' => 'text')); ?>
		</button>
	</div>
</form>
