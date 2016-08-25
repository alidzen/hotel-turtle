<form action="" data-noinit="" data-message="Спасибо, что воспользовались данной услугой. Наш менеджер перезвонит в удобное для вас время." class="b-booking-form__form j-date-booking main-book">
	 <!--<div class="b-booking-form__info">
		<div class="b-booking-form__info-ttl">14 номеров</div>
		<div class="b-booking-form__txt">забронировали сегодня</div>
	</div>-->
	<div class="b-booking-form__btn">
		<button type="submit" value="Номер"
				href="https://wubook.net/wbkd/wbk/?lcode=1442495155&dfrom=15/06/2016&dto=23/06/2016"
				class="b-btn b-btn_width_auto b-btn_text_sise_2 j-frame">
			<? $APPLICATION->IncludeFile('/local/area/'.LANGUAGE_ID.'/global-choose-room-text.php', Array(), Array('MODE' => 'text')); ?>
		</button>
	</div>
	 <!--<div class="b-booking-form__col">
		<div class="b-booking-form__select"><select>
				<option value="empty">Кол-во гостей</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
			</select></div>
	</div>-->
	<div class="b-booking-form__col">
		<input type="text" placeholder="<?=(LANGUAGE_ID == 'ru' ? 'Дата отъезда' : 'Check-out date');?>"
			   class="b-booking-to__inp j-date-inp j-date-to">
	</div>
	<div class="b-booking-form__col">
		<input type="text" placeholder="<?=(LANGUAGE_ID == 'ru' ? 'Дата заезда' : 'Check-in date');?>"
			   class="b-booking-from__inp j-date-inp j-date-from">
	</div>
</form>
