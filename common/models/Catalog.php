<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "catalog".
 *
 * @property integer $id
 * @property string $name
 * @property integer $country_id
 * @property integer $city_id
 * @property string $address
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property City $city
 * @property Country $country
 * @property Coordinate $coordinate
 */
class Catalog extends \yii\db\ActiveRecord
{

    public $coordiante;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'country_id', 'city_id', 'address'], 'required'],
            [['country_id', 'city_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'address'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['country_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'country_id' => 'Country ID',
            'city_id' => 'City ID',
            'address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'country.name' => 'Country',
            'city.name' => 'City',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['id' => 'country_id']);
    }


    public function getCoordinate()
    {
        return $this->hasOne(Coordinate::className(), ['catalog_id' => 'id']);
    }


    public function beforeDelete()
    {
        try{
            $this->coordinate->delete();
        }catch (\Error $e){
            return parent::beforeDelete();
        }

        return parent::beforeDelete();
    }
}
