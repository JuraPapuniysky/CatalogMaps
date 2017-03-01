<?php
/**
 * Created by PhpStorm.
 * User: wsst17
 * Date: 28.02.17
 * Time: 8:28
 */

namespace common\components;


use yii\base\Component;
use yii\helpers\Json;
/**
 * This is the class for component GoogleMapsResponse
 */
class GoogleMapsResponse extends Component
{
    public $url;
    public $key;

    /**
     * @param $address from model Catalog property address
     * @param $country from model Catalog property country->name
     * @param $city from model Catalog property city->name
     * @return response from Google Maps API from json to array format
     */
    public function response($address, $country, $city)
    {

        $query = $this->url.urlencode("$address $city $country")."&$this->key";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $query);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return Json::decode($data);
    }
}