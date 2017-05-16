<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "colonias".
 *
 * @property integer $id_colonia
 * @property string $nombre_colonia
 */
class Colonias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'colonias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_colonia'], 'required'],
            [['nombre_colonia'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_colonia' => 'Id Colonia',
            'nombre_colonia' => 'Nombre Colonia',
        ];
    }
}
