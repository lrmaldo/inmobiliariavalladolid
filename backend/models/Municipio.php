<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "municipio".
 *
 * @property integer $id_municipio
 * @property string $nombre_municipio
 * @property integer $id_estado
 *
 * @property Colonias[] $colonias
 * @property Estado $idEstado
 */
class Municipio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'municipio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_municipio', 'id_estado'], 'required','message'=>'no puede quedar el campo vacio'],
            [['id_estado'], 'integer'],
            [['nombre_municipio'], 'string', 'max' => 255],
            [['nombre_municipio'],'unique',"message"=>'Este municipio ya existe'],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_municipio' => 'Id Municipio',
            'nombre_municipio' => 'Nombre Municipio',
            'id_estado' => 'Id Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColonias()
    {
        return $this->hasMany(Colonias::className(), ['id_municipio' => 'id_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado()
    {
        return $this->hasOne(Estado::className(), ['id_estado' => 'id_estado']);
    }
}
