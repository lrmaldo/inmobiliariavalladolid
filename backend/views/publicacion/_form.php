<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\money\MaskMoney;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;
use kartik\widgets\DepDrop;
use yii\helpers\ArrayHelper;

$date = new \DateTime('now', new \DateTimeZone('UTC'));

//modelos de las base de datos
use backend\models\Colonias;
use backend\models\Operacion;
use backend\models\Tipos;
use backend\models\Estado;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Publicacion */

/* @var $form yii\widgets\ActiveForm */
$estados = Estado::find()->all();
$listE = ArrayHelper::map($estados, "id_estado", "nombre_estado");
$colonias = Colonias::find()->all();
$listData1 = ArrayHelper::map($colonias, 'nombre_colonia', 'nombre_colonia');
//$listData1 = CHtml::listData($colonias,'id_colonia','nombre_colonia');
$operacion = Operacion::find()->all();
$listData2 = ArrayHelper::map($operacion, 'nombre_operacion', 'nombre_operacion');
$tipos = Tipos::find()->all();
$listData3 = ArrayHelper::map($tipos, 'nombre_tipo', 'nombre_tipo');
?>

<div class="publicacion-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'url_imagen[]')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*', 'multiple' => true],
    ]);
    ?>



    <?=
    $form->field($model, 'Descripcion')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ])
    ?>

    <?=
    $form->field($model, 'precio')->widget(MaskMoney::classname(), [
        'value' => null,
        'options' => [
            'placeholder' => 'Poner un valor númerico...'
        ],
        'pluginOptions' => [
            'prefix' => '$ ',
            //'suffix' => ' €',
            'allowNegative' => false,
            'allowEmpty' => true
        ]
    ]);
    ?>

    <?= $form->field($model, 'fecha_de_publicacion')->textInput()->textInput(['readonly' => true, 'value' => $date->
                format('Y-m-d')])->label('Fecha de Alta')
    ?>


    <?= $form->field($model, 'Estado')->dropDownList($listE, ['id' => 'id_estado', 'prompt' => 'Elegir Estado...']) ?>

    <?=
    $form->field($model, 'Municipio')->widget(DepDrop::classname(), [
        'options' => ['id' => 'id_municipio'],
        'pluginOptions' => [
            'depends' => ['id_estado'],
            'placeholder' => 'Selecionar...',
            'url' => Url::to(['/publicacion/municipio'])
        ]
    ])
    ?>
    <?=
    $form->field($model, 'Colonia')->widget(DepDrop::classname(), [
        'options' => ['id' => 'id_colonia'],
        'pluginOptions' => [
            'depends' => ['id_municipio'],
            'placeholder' => 'Selecionar...',
            'url' => Url::to(['/publicacion/colonia'])
        ]
    ])
    ?>

        <?= $form->field($model, 'Operacion')->dropDownList($listData2, ['prompt' => 'Elegir Operación...']) ?>

        <?= $form->field($model, 'Tipo')->dropDownList($listData3, ['prompt' => 'Elegir Tipo...']) ?>

        <?= $form->field($model, 'num_banio')->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5',], ['prompt' => '--Seleccionar--']) ?>

        <?= $form->field($model, 'recamaras')->dropDownList([0 => '0', 1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5',], ['prompt' => '--Seleccionar--']) ?>

    <div class="form-group">
        <?=
        $form->field($model, 'precio_neto')->widget(MaskMoney::classname(), [
            'value' => null,
            'options' => [
                'placeholder' => 'Poner un valor númerico...'
            ],
            'pluginOptions' => [
                'prefix' => '$ ',
                //'suffix' => ' €',
                'allowNegative' => false,
                'allowEmpty' => true
            ]
        ]);
        ?>

<?= $form->field($model, 'notas')->textarea(['rows' => 7]) ?>

    </div>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
