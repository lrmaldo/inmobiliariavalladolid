<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tipos".
 *
 * @property integer $id_tipo
 * @property string $nombre_tipo
 */
class Tipos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_tipo'], 'required'],
            [['nombre_tipo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo' => 'Id Tipo',
            'nombre_tipo' => 'Nombre Tipo',
        ];
    }
}
