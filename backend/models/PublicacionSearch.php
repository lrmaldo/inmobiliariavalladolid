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
            [[ 'id_user'], 'integer'],
            [['idpublicacion','titulo', 'Descripcion', 'fecha_de_publicacion', 'Colonia', 'Operacion', 'Tipo', 'num_banio', 'recamaras'], 'safe'],
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
            //->andFilterWhere(['like', 'url_imagen', $this->url_imagen])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Colonia', $this->Colonia])
            ->andFilterWhere(['like', 'Operacion', $this->Operacion])
            ->andFilterWhere(['like', 'Tipo', $this->Tipo])
            ->andFilterWhere(['like', 'num_banio', $this->num_banio])
            ->andFilterWhere(['like', 'recamaras', $this->recamaras]);

        return $dataProvider;
    }
}
