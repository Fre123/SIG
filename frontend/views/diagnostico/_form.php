<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;
use wbraganca\dynamicform\DynamicFormWidget;
use frontend\models\Enfermedades;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\Diagnostico */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diagnostico-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'DESCRIPCION_DIAGNOSTICO')->textarea(['rows' => 6]) ?>



    <?php
    /* Actualizar */

    if (!empty($modelDiagnostico)) {
        foreach ($modelDiagnostico as $i => $modelDiagnostico) {

            $model->NOMBRE_RESPONSABLE = $modelDiagnostico->NOMBRE_RESPONSABLE; 
            echo $form->field($model, "NOMBRE_RESPONSABLE[{$i}]")->textInput(['value'=>$model->NOMBRE_RESPONSABLE]);

        }
    } else {

        echo $form->field($model, 'NOMBRE_RESPONSABLE')->widget(MultipleInput::className(), [
                    'max' => 6,
                    'min' => 1, // should be at least 2 rows
                    'allowEmptyList' => false,
                    'enableGuessTitle' => true,
                    'addButtonPosition' => MultipleInput::POS_HEADER])
                ->label(false);
    }
    /* Actualizar */
    ?>
        <?php $enfermedades = Enfermedades::find()->all(); ?>  
                
   
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
                'model' => $modelLugarEnfermedad[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'ID_ENFERMEDAD',
                    'ID_DIAGNOSTICO',
                    'NOMBRE_ENFERMEDAD',
                    'LATITUD_ENFERMEDAD',
                    'LONGITUD_ENFERMEDAD',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->
            <?php foreach ($modelLugarEnfermedad as $i => $modelLugarEnfermedad): ?>
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
                            if (! $modelLugarEnfermedad->isNewRecord) {
                                echo Html::activeHiddenInput($modelLugarEnfermedad, "[{$i}]ID_LUGAR_ENFERMEDAD");
                            }
                        ?>
                       
                        <div class="row">
                            <div class="col-sm-12">
                                <?= $form->field($modelLugarEnfermedad, "[{$i}]ID_ENFERMEDAD")
                                        ->dropDownList(
                                           ArrayHelper::map($enfermedades,'ID_ENFERMEDAD','NOMBRE_ENFERMEDAD'),
                                           ['prompt'=>'Seleccione la opción...']
                                        ) ?>
                            </div>

                        </div><!-- .row -->
                        <div class="row">
  
                            <div class="col-sm-12">
                                <?= $form->field($modelLugarEnfermedad, "[{$i}]NOMBRE_PACIENTE")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelLugarEnfermedad, "[{$i}]LATITUD_ENFERMEDAD")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelLugarEnfermedad, "[{$i}]LONGITUD_ENFERMEDAD")->textInput(['maxlength' => true]) ?>
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
