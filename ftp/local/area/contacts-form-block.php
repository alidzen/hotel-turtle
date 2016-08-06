<div class="l-callback">
	<div class="l-callback__cnt">
		<div class="b-callback">
			<div class="b-callback__border">
				<div class="b-callback__cnt">
					<div class="b-callback__header">
						<h2 class="b-callback__ttl">
							<?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/contacts-callback__ttl.php',
								Array(),
								Array('MODE' => 'html')
							);?>
						</h2>
						<div class="b-callback__caption">
							<?$APPLICATION->IncludeFile(
								'/local/area/' . LANGUAGE_ID . '/contacts-callback__caption.php',
								Array(),
								Array('MODE' => 'html')
							);?>
						</div>
					</div>
					<form method="post" action="/local/ajax/callback-form.logic.php" data-message="Спасибо, что воспользовались данной услугой. Наш менеджер перезвонит в удобное для вас время." class="b-callback__form">
						<div class="b-callback__row">
							<input type="text" name="name" data-errormessage="Укажите ваше имя" placeholder="<?=(LANGUAGE_ID == 'ru' ? 'Ваше имя' : 'Your name');?>" required class="b-callback__input">
						</div>
						<div class="b-callback__row">
							<div class="b-callback__col">
								<input type="tel" name="tel" pattern="^[0-9-()+\s]+$" data-errormessage="Вы забыли оставить нам номер телефона" placeholder="<?=(LANGUAGE_ID == 'ru' ? 'Ваш номер телефона' : 'Phone number');?>" autocomplete="tel" required class="b-callback__input">
							</div>
							<div class="b-callback__col">
								<input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+.[a-z]{2,3}$" data-errormessage="Вы забыли указать почту" placeholder="<?=(LANGUAGE_ID == 'ru' ? 'Ваш email' : 'Email');?>" autocomplete="email" required class="b-callback__input">
							</div>
						</div>
						<div class="b-callback__row">
							<div class="b-callback__descr">
								<textarea placeholder="<?=(LANGUAGE_ID == 'ru' ? 'Ваш вопрос' : 'Question');?>" name="text" required class="b-callback__textarea"></textarea>
							</div>
						</div>
						<div class="b-callback__row">
							<div class="b-callback__btn">
								<input type="submit" value="<?=(LANGUAGE_ID == 'ru' ? 'Отправить' : 'Submit');?>" class="b-btn b-btn_width_auto">
							</div>
						</div>
					</form>
					<div class="j-callback-form__message"></div>
				</div>
			</div>
		</div>
	</div>
</div>