<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "operacion".
 *
 * @property integer $id_operacion
 * @property string $nombre_operacion
 */
class Operacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'operacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_operacion'], 'required'],
            [['nombre_operacion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_operacion' => 'Id Operacion',
            'nombre_operacion' => 'Nombre Operacion',
        ];
    }
}
