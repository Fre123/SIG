<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Registro de usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    
    <h1><?= Html::encode("Registro de usuarios") ?></h1>

    <p>Por favor, ingrese la información en los siguientes campos</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->label('Nombre de Usuarios')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email')->label('Coerreo electrónico') ?>

                <?= $form->field($model, 'password')->label('Contraseña')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Registrarse', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
