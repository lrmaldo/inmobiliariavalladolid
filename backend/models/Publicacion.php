<?php

namespace backend\models;

use Yii;
use common\models\User;
/**
 * This is the model class for table "publicacion".
 *
 * @property integer $idpublicacion
 * @property string $titulo
 * @property string $url_imagen
 * @property string $Descripcion
 * @property double $precio
 * @property string $fecha_de_publicacion
 * @property string $Colonia
 * @property string $Operacion
 * @property string $Tipo
 * @property string $num_banio
 * @property string $recamaras
 * @property integer $id_user
 */
class Publicacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publicacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url_imagen', 'Descripcion', 'precio', 'fecha_de_publicacion', 'Colonia', 'Operacion', 'Tipo', 'id_user'], 'required'],
            [['Descripcion', 'Colonia', 'Operacion', 'Tipo', 'num_banio', 'recamaras'], 'string'],
            [['precio',], 'number'],
            [['fecha_de_publicacion'], 'safe'],
            [['id_user'], 'integer'],
            [['titulo',], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpublicacion' => 'Idpublicacion',
            'titulo' => 'Título',
            //'url_imagen' => 'Url Imagen',
            'Descripcion' => 'Descripción',
            'precio' => 'Precio',
            'fecha_de_publicacion' => 'Fecha De Publicación',
            'Colonia' => 'Colonia',
            'Operacion' => 'Operación',
            'Tipo' => 'Tipo',
            'num_banio' => 'Número de Baños',
            'recamaras' => 'Recamaras',
            'id_user' => 'Id User',
        ];
    }
     public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
   
}
