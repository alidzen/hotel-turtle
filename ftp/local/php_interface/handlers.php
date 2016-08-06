<?
use Bitrix\Main\Application;

$eventManager = \Bitrix\Main\EventManager::getInstance();
$eventManager->addEventHandler("main", "OnEndBufferContent", "getTripper");

function getTripper(&$buffer)
{
	$request = Application::getInstance()->getContext()->getRequest();

	if (preg_match('/#TRIPPER_STARS#/', $buffer) && !$request->isAjaxRequest())
	{
		$stars['STARS_HTML'] = '<div class="b-menu-reviews__rate">'.'<span></span>'.'<span></span>'.'<span></span>'.'<span></span>'.'<span></span>'.'</div>';

		$cache = \Bitrix\Main\Data\Cache::createInstance();

		if ($cache->initCache(86400, 'tripadvisorstars', '/olympia/tripadvisor/stars/'))
		{
			$res = $cache->getVars();

			$stars['STARS_HTML'] = $res;
		}
		else
		{
			$curl = curl_init('https://www.tripadvisor.ru/Hotel_Review-g298507-d9456388-Reviews-Akhilles_i_Cherepakha-St_Petersburg_Northwestern_District.html');
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$output = curl_exec($curl);
			curl_close($curl);

			preg_match('/<img.*property=\"ratingValue\".*content=\"([0-9.]+)\".*>/mi', $output, $matches);

			$digits = explode('.', $matches[1]);

			$stars['STARS_HTML'] = '<div class="b-menu-reviews__rate">';

			for ($i = 1; $i <= 5; $i++)
				$stars['STARS_HTML'] .= ($i <= $digits[0] ? '<span class="star"></span>' : ($i > $digits[0] && $i < $digits[0] + 2 && isset($digits[1]) ? '<span class="half-star"></span>' : '<span></span>'));

			$stars['STARS_HTML'] .= '</div>';

			if ($cache->startDataCache())
				$cache->endDataCache($stars['STARS_HTML']);
		}

		$buffer = str_replace('#TRIPPER_STARS#', $stars['STARS_HTML'], $buffer);
	}
}