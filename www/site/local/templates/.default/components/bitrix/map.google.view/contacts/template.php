<div class="l-map">
	<div class="b-map">
		<div class="b-map__mobile">
			<div class="b-map__img"></div>
			<div class="b-map__btn"><a href="#popup-map" data-target="#map" data-theme="map" class="b-btn b-btn_bg_white j-popup">Развернуть карту</a></div>
		</div>
		<div class="b-map__cnt">
			<div id="map" data-noinit data-zoom="15" data-scrollwheel="false" class="j-map b-map__base"></div>
		</div>
	</div>
</div>
<div id="popup-map" class="mfp-hide b-popup"><a href="javascript:;" title="Закрыть" class="b-popup__close">Свернуть карту</a>
	<div class="b-popup__cnt"></div>
</div>
<script>
	window.map = {};
	window.map['map'] = {
		markers: [
		{
			coords: [59.923350, 30.346303],
			image: '/local/assets/img/markers/here.svg'
		}]
	}
</script>
