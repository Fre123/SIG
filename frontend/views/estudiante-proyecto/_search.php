<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstudianteProyectoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-proyecto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_PROYECTO') ?>

    <?= $form->field($model, 'ID_ESTUDIANTE') ?>

    <?= $form->field($model, 'FECHA_REGISTRO') ?>

    <?= $form->field($model, 'HORAS') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
