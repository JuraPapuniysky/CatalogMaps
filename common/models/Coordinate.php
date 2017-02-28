<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "coordinate".
 *
 * @property integer $id
 * @property integer $catalog_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property double $lat
 * @property double $lng
 * @property string $name
 * @property string $place_id
 * @property string $reference
 * @property string $formated_address
 *
 * @property Catalog $catalog
 */
class Coordinate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coordinate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catalog_id', 'created_at', 'updated_at', 'lat', 'lng'], 'required'],
            [['catalog_id', 'created_at', 'updated_at'], 'integer'],
            [['lat', 'lng'], 'number'],
            [['name', 'place_id', 'reference', 'formated_address'], 'string', 'max' => 255],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::className(), 'targetAttribute' => ['catalog_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catalog_id' => 'Catalog ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'name' => 'Name',
            'place_id' => 'Place ID',
            'reference' => 'Reference',
            'formated_address' => 'Formated Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalog_id']);
    }
}
