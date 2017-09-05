<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Publicidad;

/**
 * PublicidadSearch represents the model behind the search form about `backend\models\Publicidad`.
 */
class PublicidadSearch extends Publicidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_publicidad'], 'integer'],
            [['titulo', 'url_publicidad', 'url_imagen_publicidad'], 'safe'],
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
        $query = Publicidad::find();

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
            'id_publicidad' => $this->id_publicidad,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'url_publicidad', $this->url_publicidad])
            ->andFilterWhere(['like', 'url_imagen_publicidad', $this->url_imagen_publicidad]);

        return $dataProvider;
    }
}
