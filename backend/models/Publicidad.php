<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "publicidad".
 *
 * @property integer $id_publicidad
 * @property string $titulo
 * @property string $url_publicidad
 * @property string $url_imagen_publicidad
 */
class Publicidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'publicidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo', 'url_publicidad'], 'required'],
            [['url_publicidad'], 'url','defaultScheme'=>'http'],
            [['titulo'], 'string', 'max' => 255],
            [['url_imagen_publicidad'], 'file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_publicidad' => 'Id Publicidad',
            'titulo' => 'Titulo',
            'url_publicidad' => 'Url Publicidad',
            'url_imagen_publicidad' => 'Url Imagen Publicidad',
        ];
    }
}
