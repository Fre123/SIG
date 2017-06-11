<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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

    <?= $form->field($model, 'SEXO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
