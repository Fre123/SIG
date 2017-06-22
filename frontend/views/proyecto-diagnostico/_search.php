<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProyectoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyecto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_PROYECTO') ?>

    <?= $form->field($model, 'NOMBRE_PROYECTO') ?>

    <?= $form->field($model, 'ESTADO_CUMPLIMIENTO_PROYECTO') ?>

    <?= $form->field($model, 'FECHA_INICIO_PROYECTO') ?>

    <?= $form->field($model, 'FECHA_FIN_PROYECTO') ?>

    <?php // echo $form->field($model, 'PORCENTAJE_EJECUCION_PROYECTO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
