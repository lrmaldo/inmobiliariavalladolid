<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Colonias;

/**
 * ColoniasSearch represents the model behind the search form about `backend\models\Colonias`.
 */
class ColoniasSearch extends Colonias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_colonia'], 'integer'],
            [['nombre_colonia'], 'safe'],
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
        $query = Colonias::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_colonia' => $this->id_colonia,
        ]);

        $query->andFilterWhere(['like', 'nombre_colonia', $this->nombre_colonia]);

        return $dataProvider;
    }
}
