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
 * @property string $Zona
 * @property string $Operacion
 * @property string $Tipo
 * @property integer $id_user
 *
 * @property User $idUser
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
            [['url_imagen', 'Descripcion', 'precio', 'fecha_de_publicacion', 'Zona', 'Operacion', 'Tipo', 'id_user'], 'required'],
            [['Descripcion', 'Zona', 'Operacion', 'Tipo'], 'string'],
            [['precio'], 'number'],
            [['fecha_de_publicacion'], 'safe'],
            [['id_user'], 'integer'],
            [['titulo', 'url_imagen'], 'string', 'max' => 255],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpublicacion' => 'Idpublicacion',
            'titulo' => 'Titulo',
            'url_imagen' => 'Url Imagen',
            'Descripcion' => 'Descripcion',
            'precio' => 'Precio',
            'fecha_de_publicacion' => 'Fecha De Publicacion',
            'Zona' => 'Zona',
            'Operacion' => 'Operacion',
            'Tipo' => 'Tipo',
            'id_user' => 'Id User',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
