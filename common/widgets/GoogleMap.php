<?php


namespace common\widgets;

use yii\bootstrap\Widget;

class GoogleMap extends Widget
{

    public $lat;
    public $lng;
    public $title;
    private $key;

    public function init()
    {
        parent::init();

        $this->key = \Yii::$app->googleMapsResponse->key;
    }

    public function run()
    {
        return $this->render('google_map',[
            'lat' => $this->lat,
            'lng' => $this->lng,
            'title' => $this->title,
            'key' => $this->key,
        ]);
    }
}