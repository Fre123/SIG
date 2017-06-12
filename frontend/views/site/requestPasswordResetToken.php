<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    
    <h1><?= Html::encode('Solicitud para recuperar la contraseña') ?></h1>

    <p>Por favor ingrese su correo, se le envíará un enlace para recuperar su contraseña.</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->label('Correro Electrónico')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
