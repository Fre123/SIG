<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Diagnostico */

$this->title = 'Update Diagnostico: ' . $model->ID_DIAGNOSTICO;
$this->params['breadcrumbs'][] = ['label' => 'Diagnosticos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_DIAGNOSTICO, 'url' => ['view', 'id' => $model->ID_DIAGNOSTICO]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="diagnostico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelDiagnostico' => $modelDiagnostico,
        'modelLugarEnfermedad' => $modelLugarEnfermedad,

    ]) ?>

</div>
