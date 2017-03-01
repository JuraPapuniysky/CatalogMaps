<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * CatalogSearch represents the model behind the search form about `common\models\Catalog`.
 */
class CatalogSearch extends Catalog
{

    public $city;
    public $country;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'country_id', 'city_id', 'created_at', 'updated_at'], 'integer'],
            [['name', 'address', 'city', 'country'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Catalog::find();

        // add conditions that should always apply here
        $query->joinWith(['city', 'country']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['city'] = [

            'asc' => ['city.name' => SORT_ASC],
            'desc' => ['city.name' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['country'] = [
            'asc' => ['country.name' => SORT_ASC],
            'desc' => ['country.name' => SORT_DESC],
        ];

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'country_id' => $this->country_id,
            'city_id' => $this->city_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'city.name', $this->city])
            ->andFilterWhere(['like', 'country.name', $this->country])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}
