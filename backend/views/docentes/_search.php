<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DocentesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docentes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_DOCENTES') ?>

    <?= $form->field($model, 'ID_ESCUELA') ?>

    <?= $form->field($model, 'NOMBRE_DOCENTES') ?>

    <?= $form->field($model, 'CEDULA_DOCENTE') ?>

    <?= $form->field($model, 'SEXO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
