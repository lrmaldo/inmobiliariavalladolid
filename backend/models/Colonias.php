<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "colonias".
 *
 * @property integer $id_colonia
 * @property string $nombre_colonia
 * @property integer $id_municipio
 *
 * @property Municipio $idMunicipio
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
            [['nombre_colonia', 'id_municipio'], 'required','message'=>'no puede quedar el campo vacio'],
            [['id_municipio'], 'integer'],
            [['nombre_colonia'], 'string', 'max' => 255],
            [['nombre_colonia'],'unique',"message"=>'Este colonia ya existe'],

            //[['id_municipio'], 'unique'],
            [['id_municipio'], 'exist', 'skipOnError' => true, 'targetClass' => Municipio::className(), 'targetAttribute' => ['id_municipio' => 'id_municipio']],
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
            'id_municipio' => 'Id Municipio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMunicipio()
    {
        return $this->hasOne(Municipio::className(), ['id_municipio' => 'id_municipio']);
    }
}
