<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EstudianteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_ESTUDIANTE') ?>

    <?= $form->field($model, 'ID_ESCUELA') ?>

    <?= $form->field($model, 'NOMBRE_ESTUDIANTE') ?>

    <?= $form->field($model, 'CEDULA_ESTUDIANTE') ?>

    <?= $form->field($model, 'MATRICULA_ESTUDIANTE') ?>

    <?php // echo $form->field($model, 'SEXO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
