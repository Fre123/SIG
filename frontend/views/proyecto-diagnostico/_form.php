<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Escuela;
use wbraganca\dynamicform\DynamicFormWidget;
/* @var $this yii\web\View */
/* @var $model frontend\models\Proyecto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyecto-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'ID_PROYECTO')->textInput() ?>

    <?= $form->field($model, 'NOMBRE_PROYECTO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTADO_CUMPLIMIENTO_PROYECTO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FECHA_INICIO_PROYECTO')->textInput() ?>

    <?= $form->field($model, 'FECHA_FIN_PROYECTO')->textInput() ?>

    <?= $form->field($model, 'PORCENTAJE_EJECUCION_PROYECTO')->textInput(['maxlength' => true]) ?>
    
    <label class="control-label" for="proyecto-fecha_fin_proyecto">Escuelas</label>
    
    <?php $escuelas = Escuela::find()->all(); ?>  
     <div class="row">
                <?php foreach($escuelas as $value){ ?>  
                <div class="col-md-4">
                <?php     
                   echo $form->field($model, 'ESCUELAS')->checkbox([
                            'label'=>$value->NOMBRE_ESCUELA,
                            'value' => $value->ID_ESCUELA,
                            'class'=>'flat'
                        ])->label(false);
                ?>   
                </div>
    <?php } ?>                   
    </div>       
     
    <div class="panel panel-default">
        <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Addresses</h4></div>
        <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 4, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelLugar[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'LONGITUD_LUGAR',
                    'LONGITUD_LUGAR'
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelLugar as $i => $modelLugar): ?>
                <div class="item panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Lugar</h3>
                        <div class="pull-right">
                            <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelLugar->isNewRecord) {
                                echo Html::activeHiddenInput($modelLugar, "[{$i}]ID_LUGAR");
                            }
                        ?>
                       
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelLugar, "[{$i}]LATITUD_LUGAR")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelLugar, "[{$i}]LONGITUD_LUGAR")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
