				</div>
			</main>
		</section>
		<footer class="l-footer">
			<div class="l-footer__cnt">
				<div class="l-limit-wrap">
					<div class="l-footer__row">
						<div class="l-footer__col">
							<div class="b-olympia">
								<div class="b-olympia__txt">Сделано в</div>
								<a href="http://www.olympia.digital/" target="_blank" title="Олимпия" class="b-olympia__logo-wrap"> <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 103.8 1280 634.3" class="b-olympia__logo">
				<g fill="#FFF">
				  <path d="M88.4 103.8c50.1 0 88.4 37.6 88.4 90.5 0 51.8-38.3 90.5-88.4 90.5S0 246.8 0 194.3c0-51.2 37.6-90.5 88.4-90.5zm0 167.7c43.1 0 73.8-33.4 73.8-77.2 0-44.5-32.4-77.2-73.8-77.2-41.8 0-73.8 32.7-73.8 77.2 0 43.8 32.4 77.2 73.8 77.2zM240.8 106.3h13.9v163.2h92.9v13.2H240.8V106.3zM431.1 205.1V282h-13.9v-76.9l-62.6-99.2h16l54.3 85.9 54.3-85.9h15.3l-63.4 99.2zM548.7 106.3H563l71 96.7 68.2-96.7h13.2v176h-13.9V127.8l-67.8 95h-2.4l-68.5-94.3v153.8h-13.9v-176zM793.6 282.3v-176c9.7 0 33.1-.3 43.1-.3 48.7 0 62.6 26.8 62.6 53.2 0 27.5-18.8 53.9-62.6 53.9-8.4 0-19.1-.3-29.2-1v70.6h-13.9v-.4zm13.9-163.2v79c9.7.7 18.8 1.4 28.5 1.4 32 0 48.7-16.7 48.7-41.1 0-23-13.6-39.7-47-39.7-7.6.1-21.8.1-30.2.4zM969.7 106.3h13.9v176h-13.9v-176zM1122 104.5h11.5l76.9 177.8h-15l-25.7-59.8h-84.5l-25.7 59.8h-14.3l76.8-177.8zm-31.3 104.7h73.1l-36.5-85.6-36.6 85.6zM1271 263.5c5.2 0 9 4.5 9 9 0 5.2-3.8 10.1-9 10.1-5.9 0-10.1-4.9-10.1-10.1 0-4.5 4.1-9 10.1-9zM14.3 407.9H17c12.5 0 26.8-.7 42.4-.7 70.6 0 98.8 40.4 98.8 86.3 0 50.4-33.7 91.2-100.9 91.2-12.9 0-26.8-.3-40.7-.3h-2.4V407.9zm13.9 13.2v150c14.3.3 27.8.3 29.6.3 56.7 0 85.9-34.1 85.9-77.9 0-40.7-26.1-73.1-84.9-73.1-12.9 0-20.2.4-30.6.7zM228.6 407.9h13.9v176h-13.9v-176zM401.2 499.1h64.7v63.3c-15.7 15.7-44.2 24-65.8 24-52.5 0-87.3-35.5-87.3-90.5 0-50.4 34.1-90.5 85.6-90.5 23 0 40 5.2 54.3 16.7l-6.3 10.8c-11.5-9.7-28.2-14.3-46.6-14.3-43.1 0-72.4 32.4-72.4 77.2 0 47 29.6 77.2 73.1 77.2 19.1 0 41.1-7.3 52.2-18.4v-43.1h-51.5v-12.4zM538.6 407.9h13.9v176h-13.9v-176zM611.6 407.9h144v13.2h-65.1v163.2h-13.9V421.1h-65.1l.1-13.2zM844.1 406.5h11.5l76.9 177.8h-15l-25.7-59.8h-84.5l-25.7 59.8h-14.3l76.8-177.8zm-31.4 104.7h73.1l-36.5-85.6-36.6 85.6zM988.1 407.9h13.9v163.2h92.9v13.2H988.1V407.9z"></path>
				</g>
				<path fill="#FFF" d="M3.8 668.5h1269.9v69.6H3.8z"></path>
			  </svg></a>
							</div>
						</div>
						<div class="l-footer__col">
							<div class="b-menu-contacts b-menu-contacts_theme_footer">
								<?$APPLICATION->IncludeFile(
									'/local/area/' . LANGUAGE_ID . '/phone-block.php',
									Array(),
									Array('MODE' => 'html')
								);?>
								<a href="#popup-map-common" class="b-menu-contacts__map j-map-popup">
									<?$APPLICATION->IncludeFile(
									'/local/area/' . LANGUAGE_ID . '/address-2.php',
									Array(),
									Array('MODE' => 'html')
									);?>
								</a>
							</div>
						</div>
						<div class="l-footer__col">
							<a href="http://brain-games.ru/" title="Игры Разума" class="b-mind-games" target="_blank"></a>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<div id="popup-map-common" class="b-place-popup mfp-hide">
			<div id="map" data-noinit data-zoom="15" data-scrollwheel="false" class="b-place-popup__map j-map">
				<script>
					window.map = {}
					window.map['map'] = {
						markers: [
							{
								coords: [59.923350, 30.346303],
								image: '/local/assets/img/markers/here.svg'
							}]
					}
				</script>
			</div>
		</div>
	</div>
	<div class="l-preloader j-loader">
		<div class="b-loader"></div>
	</div>
	<?$APPLICATION->IncludeFile(
			"/local/area/counters.php",
			Array(),
			Array("MODE" => "text", "NAME" => "счетчики")
	);?>
</body>
</html>
