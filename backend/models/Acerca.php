<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "acerca".
 *
 * @property integer $id_acerca
 * @property string $texto
 * @property string $direccion
 * @property integer $telefono
 * @property string $correo
 */
class Acerca extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acerca';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['texto', 'direccion', 'telefono', 'correo'], 'required','message'=>'No puede dejar espacios vacios'],
            [['texto'], 'string'],
            [['telefono'], 'string'],
            [['direccion'], 'string', 'max' => 500],
            [['correo'], 'email', ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_acerca' => 'Id Acerca',
            'texto' => 'Texto',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
        ];
    }
}
