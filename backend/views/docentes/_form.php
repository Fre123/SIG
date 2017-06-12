<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model backend\models\Docentes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docentes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_DOCENTES')->textInput() ?>

    <?= $form->field($model, 'ID_ESCUELA')->textInput() ?>

    <?= $form->field($model, 'NOMBRE_DOCENTES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CEDULA_DOCENTE')->textInput(['maxlength' => true]) ?>

  
        <?php
        echo $form->field($model, 'SEXO')->label('SEXO')->widget(Select2::classname(), [
            'data'  =>['F'=>'FEMENINO','M'=>'MASCULINO'],
            'options' => ['placeholder' => 'Seleccione la opción...'],
            'pluginOptions' => [
            'allowClear' => true
            ],
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
