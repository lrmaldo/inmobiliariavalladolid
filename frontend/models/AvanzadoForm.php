<?php
namespace frontend\models;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Yii;
use yii\base\Model;

class AvanzadoForm extends Model{
    public $e;
    public $m;
    public $c;
    public $t;
    public $o;
    public $precioMin;
    public $precioMax;
    


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [['e','m','c','t','o','precioMin','precioMax'], 'required', 'message' => 'Campo requerido'],
           // [['e','m','c'],'default'=>null],
            
//            ["f", "match", "pattern" => "/^[0-9a-záéíóúñ\s]+$/i", "message" => "Sólo se aceptan letras y números"],
//             ["t", "match", "pattern" => "/^[0-9a-záéíóúñ\s]+$/i", "message" => "Sólo se aceptan letras y números"],
//             ["o", "match", "pattern" => "/^[0-9a-záéíóúñ\s]+$/i", "message" => "Sólo se aceptan letras y números"],
//            ["precioMin", "match", "pattern" => "/^[0-9a-záéíóúñ\s]+$/i", "message" => "Sólo se aceptan letras y números"],
//             ["precioMax", "match", "pattern" => "/^[0-9a-záéíóúñ\s]+$/i", "message" => "Sólo se aceptan letras y números"],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'e'=>"Estados",
            'm'=> "Municipios",
            'c' => "Colonias",
            't'=> "Tipo de propiedad",
            'o'=> "Tipo de Transacción",
            'precioMin'=> "Precio Mínimo",
            'precioMax'=> "Precio Maximo",
        ];
    }

}

