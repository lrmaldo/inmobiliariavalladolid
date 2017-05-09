<?php

namespace backend\models;

use Yii;
use backend\models\Publicacion;
use common\models\User;

/**
 * This is the model class for table "imagenes".
 *
 * @property integer $id_imagen
 * @property string $url_imagen
 * @property integer $id_user
 * @property integer $id_publicacion
 *
 * @property User $idUser
 * @property Publicacion $idPublicacion
 */
class Imagenes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imagenes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url_imagen', 'id_user', 'id_publicacion'], 'required'],
            [['id_user', 'id_publicacion'], 'integer'],
            [['url_imagen'], 'string', 'max' => 255],
            [['id_user'], 'unique'],
            [['id_publicacion'], 'unique'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_publicacion'], 'exist', 'skipOnError' => true, 'targetClass' => Publicacion::className(), 'targetAttribute' => ['id_publicacion' => 'idpublicacion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_imagen' => 'Id Imagen',
            'url_imagen' => 'Url Imagen',
            'id_user' => 'Id User',
            'id_publicacion' => 'Id Publicacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPublicacion()
    {
        return $this->hasOne(Publicacion::className(), ['idpublicacion' => 'id_publicacion']);
    }
}
