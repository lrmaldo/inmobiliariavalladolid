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
 * @property double $precio_neto
 * @property string $fecha_de_publicacion
 * @property string $Estado 
 * @property string $Municipio 
 * @property string $Colonia
 * @property string $Operacion
 * @property string $Tipo
 * @property string $num_banio
 * @property string $recamaras
 * @property string $notas
 * @property integer $id_user
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
            [['titulo', 'url_imagen', 'Descripcion', 'precio', 'precio_neto', 'fecha_de_publicacion', 'Estado', 'Municipio', 'Colonia', 'Operacion', 'Tipo', 'num_banio', 'recamaras', 'notas', 'id_user'], 'required','message'=>'Falto llenar este campo'],
            [['idpublicacion', 'id_user'], 'integer'],
            [['Descripcion', 'num_banio', 'recamaras', 'notas'], 'string'],
            [['precio', 'precio_neto'], 'number'],
            [['fecha_de_publicacion'], 'safe'],
            ['url_imagen','file','maxFiles'=>40],
//            [ 'url_imagen','unsafe'],
            [['titulo','Estado','Municipio', 'Colonia', 'Operacion', 'Tipo'], 'string', 'max' => 255],
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
            'precio_neto' => 'Precio Neto',
            'fecha_de_publicacion' => 'Fecha De Publicacion',
             'Estado' => 'Estado', 
           'Municipio' => 'Municipio', 
            'Colonia' => 'Colonia',
            'Operacion' => 'Operacion',
            'Tipo' => 'Tipo',
            'num_banio' => 'Número de baños',
            'recamaras' => 'Número de recamaras',
            'notas' => 'Notas',
            'id_user' => 'Id User',
        ];
    }
    
     public function getIdUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
