<?php

namespace olympia;

/**
 * Класс для получения информации по отелям через систему Tripadvisor.
 *
 * Class TripAdvisor
 * @package olympia
 */
class COTripAdvisor
{
    protected static $_instance = null;
    private $apiKey;
    private $apiServerUrl;

    private function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->apiServerUrl = 'http://api.tripadvisor.com/api/partner/2.0/';
    }

	/**
	 * @param $apiKey
	 * @return null|TripAdvisorClient
	 */
    public static function instance($apiKey) 
	{
        if ( is_null( self::$_instance ) )
            self::$_instance = new self($apiKey);

        return self::$_instance;
    }

    /**
     * Выполняет метод к API TripAdvisor - https://developer-tripadvisor.com/content-api/documentation/
     *
     * @param string $method
     * @param array $params
     * @param string $mapper
     * @return array
     */
    protected function call_method($method, $params = [], $mapper = '')
    {
        foreach ($params as $key => $value)
        {
            if (empty($value))
                unset($params[$key]);
        }

        if (!empty($this->apiKey))
            $params = array("key" => $this->apiKey.$mapper) + $params;

        $url = $this->apiServerUrl . "$method?" . http_build_query($params);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$response = curl_exec($ch);
		curl_close($ch);

        return json_decode($response, true);
    }

    /**
     * Метод получает всю информацию по отелю или указанные, конкретные поля
     *
     * @param string $hotelName
     * @param string $address
     * @param array $fields
     * @param int   $locationId
     * @return array
     */
    public function get_hotel_info($locationId = null, $fields = [], $hotelName = null, $address = null)
    {
        if (empty($locationId))
            $locationId = $this->get_location_id($hotelName, $address);

        $fullHotelInfo = ($locationId) ? $this->call_method("location/".$locationId, ['lang' => 'ru']) : [];

        if (!empty($fields) && is_array($fields))
            return self::get_fields($fullHotelInfo, $fields);
        else
            return $fullHotelInfo;
    }

    /**
     * Метод получает Location ID отеля по названию отеля и его адресу
     *
     * @param string $hotelName
     * @param string $address
     * @return int
     */
    public function get_location_id($hotelName = null, $address = null)
    {
        $coords = self::get_coords($hotelName, $address);

        if (empty($coords))
            return false;

        $shortHotelInfo = $this->call_method("location_mapper/".urlencode($coords), ["category" => "hotels", "q" => $hotelName], "-mapper");

        $locationId = $shortHotelInfo["data"][0]["location_id"];

        if (empty($locationId))
            return false;

        return $locationId;
    }

    /**
     * Метод получает конкретные данные по отелю из готового массива
     *
     * @param array $fullHotelInfo
     * @param array $fields
     * @return array
     */
    public static function get_fields($fullHotelInfo = [], $fields = [])
    {
        $hotelInfo = [];

        foreach ($fields as $field)
            $hotelInfo[$field] = $fullHotelInfo[$field];

        return $hotelInfo;
    }

    /**
     * Метод получает координаты отеля по его имени и адресу
     *
     * @param string $hotelName
     * @param string $address
     * @return string
     */
    public static function get_coords($hotelName = null, $address = null)
    {
        if (empty($hotelName) || empty($address))
            return false;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($hotelName).",".urlencode($address)."&sensor=false");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        $res = curl_exec($ch);
        curl_close($ch);

        $coordsObj = json_decode($res);

        $lat = $coordsObj->results[0]->geometry->location->lat;
        $lng = $coordsObj->results[0]->geometry->location->lng;

        if (empty($lat) && empty($lng))
            return false;
        else
            return $lat.','.$lng;
    }
}