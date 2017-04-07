<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "Terrenos".
 *
 * @property integer $ID_Terreno
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $Ubicacion
 * @property string $Precio
 * @property string $Propietario
 * @property string $Notas
 */
class Terrenos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Terrenos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Descripcion', 'Ubicacion', 'Precio', 'Propietario', 'Notas'], 'required'],
            [['Descripcion', 'Ubicacion', 'Notas'], 'string'],
            [['Precio'], 'number'],
            [['Nombre', 'Propietario'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID_Terreno' => 'Id  Terreno',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Ubicacion' => 'Ubicacion',
            'Precio' => 'Precio',
            'Propietario' => 'Propietario',
            'Notas' => 'Notas',
        ];
    }
}
