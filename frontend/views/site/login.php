<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>
<div class="site-login">
    
    
    <center><i class="fa fa-send-o fa-5x text-success pull-right"></i></center>
    
    <h1><?= Html::encode("Inicion de Sesión") ?></h1>

    <p>Por favor, ingrese la información en los siguientes campos:</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->label('Nombre de Usuario')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->label('Contraseña')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->label('Recordar la Contraseña')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    Olvido la contraseña <?= Html::a('Recuperarla', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Inicio de sesion', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                </div>
        

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="row">
            <div class="col-lg-9">
                <p>Si aún no se dispone de una cuenta de usuario, por favor de <span class="label label-success ">Clip</span> en el boton crear cuenta de usuario</p>      
            </div>
            <div class="col-lg-3">
                   <?= Html::a('Crear Cuenta de Usuario', ['site/signup'],['class'=>'btn btn-success']) ?>.        
            </div>
    </div>

</div>
