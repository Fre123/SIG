<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Estudiante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_ESTUDIANTE')->textInput() ?>

    <?= $form->field($model, 'ID_ESCUELA')->textInput() ?>

    <?= $form->field($model, 'NOMBRE_ESTUDIANTE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CEDULA_ESTUDIANTE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MATRICULA_ESTUDIANTE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEXO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
