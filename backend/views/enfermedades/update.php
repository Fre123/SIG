<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Enfermedades */

$this->title = 'Update Enfermedades: ' . $model->ID_ENFERMEDAD;
$this->params['breadcrumbs'][] = ['label' => 'Enfermedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ENFERMEDAD, 'url' => ['view', 'id' => $model->ID_ENFERMEDAD]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="enfermedades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
