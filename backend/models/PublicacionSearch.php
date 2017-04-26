<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Publicacion;

/**
 * PublicacionSearch represents the model behind the search form about `backend\models\Publicacion`.
 */
class PublicacionSearch extends Publicacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpublicacion', 'id_user'], 'integer'],
            [['titulo', 'url_imagen', 'Descripcion', 'fecha_de_publicacion', 'Zona', 'Operacion', 'Tipo'], 'safe'],
            [['precio'], 'number'],
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
        $query = Publicacion::find();

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
            'idpublicacion' => $this->idpublicacion,
            'precio' => $this->precio,
            'fecha_de_publicacion' => $this->fecha_de_publicacion,
            'id_user' => $this->id_user,
        ]);

        $query->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'url_imagen', $this->url_imagen])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Zona', $this->Zona])
            ->andFilterWhere(['like', 'Operacion', $this->Operacion])
            ->andFilterWhere(['like', 'Tipo', $this->Tipo]);

        return $dataProvider;
    }
}
