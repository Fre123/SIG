<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Docentes */

$this->title = 'Update Docentes: ' . $model->ID_DOCENTES;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_DOCENTES, 'url' => ['view', 'id' => $model->ID_DOCENTES]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="docentes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
