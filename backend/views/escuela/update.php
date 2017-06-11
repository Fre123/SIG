<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Escuela */

$this->title = 'Update Escuela: ' . $model->ID_ESCUELA;
$this->params['breadcrumbs'][] = ['label' => 'Escuelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_ESCUELA, 'url' => ['view', 'id' => $model->ID_ESCUELA]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="escuela-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
