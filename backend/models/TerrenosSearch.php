<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Terrenos;

/**
 * TerrenosSearch represents the model behind the search form about `backend\models\Terrenos`.
 */
class TerrenosSearch extends Terrenos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID_Terreno'], 'integer'],
            [['Nombre', 'Descripcion', 'Ubicacion', 'Propietario', 'Notas'], 'safe'],
            [['Precio'], 'number'],
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
        $query = Terrenos::find();

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
            'ID_Terreno' => $this->ID_Terreno,
            'Precio' => $this->Precio,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Ubicacion', $this->Ubicacion])
            ->andFilterWhere(['like', 'Propietario', $this->Propietario])
            ->andFilterWhere(['like', 'Notas', $this->Notas]);

        return $dataProvider;
    }
}
