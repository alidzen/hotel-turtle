<?

function p($Array = Array(), $dump = FALSE)
{
	global $USER;

	if($USER->IsAdmin())
	{
		echo "<pre>";

		if($dump === TRUE)
			var_dump($Array);
		else
			echo print_r($Array, TRUE);

		echo "</pre>";
	}
}

function wordForm($n, $forms)
{
    return $n % 10 == 1 && $n % 100 != 11 ? $forms[0] : ($n % 10 >= 2 && $n % 10 <= 4 && ($n % 100 < 10 || $n % 100 >= 20) ? $forms[1] : $forms[2]);
}