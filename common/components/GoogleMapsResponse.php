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

class GoogleMapsResponse extends Component
{
    public $url;
    public $key;




    public function response($address)
    {
        $query = $this->url.$address.$this->key;
        return Json::decode(file_get_contents($query));
    }
}