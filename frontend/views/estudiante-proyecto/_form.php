<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use frontend\models\Proyecto;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\EstudianteProyecto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-proyecto-form">
    
    <?php $form = ActiveForm::begin(); ?>
    

   <?= $form->field($model, 'ID_PROYECTO')->label('Proyecto')->widget(Select2::classname(), [
                       'data' => ArrayHelper::map(Proyecto::find()->all(), 'ID_PROYECTO', 'NOMBRE_PROYECTO'),
                       'language' => 'es',
                       'options' => ['prompt'=> 'Seleccione la opción...', 'id' => 'idproyecto'],
                       'pluginOptions' => [
                           'allowClear' => true
                       ],
      ]); ?>
 
    <?php
        echo $form->field($model, 'TIPO')->label('Tipo de Integrante')->widget(Select2::classname(), [
            'data'  =>['ESTUDIANTE'=>'ESTUDIANTE','DOCENTE'=>'DOCENTE'],
            'options' => ['placeholder' => 'Seleccione la opción...', 'id' => 'idTipo'],
            'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
    ?>
 
    <?= $form->field($model, 'ID_ESTUDIANTE')->label('Integrantes')->widget(Select2::classname(), [
                         'language' => 'es',
                         'options' => ['prompt'=> 'Seleccione la opción...', 'id' => 'idEstudiante'],
                         'pluginOptions' => [
                             'allowClear' => true
                         ],
                ]); ?>
    
    <?= $form->field($model, 'HORAS')->textInput() ?>
    
    <?= $form->field($model, 'FECHA_REGISTRO')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$script = <<< JS
       
//here you right all you code javascript  stuff CODNACIONALIDAD
$('#idTipo').change(function(){
  
    $.post("index.php?r=estudiante-proyecto/tipo&tipo="+$(this).val(), function( data ){
        $("select#idEstudiante").html( data );
    });
 
 
});
      
JS;
$this->registerJs($script);
 ?>