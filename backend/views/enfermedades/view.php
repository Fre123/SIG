<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Enfermedades */

$this->title = $model->ID_ENFERMEDAD;
$this->params['breadcrumbs'][] = ['label' => 'Enfermedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enfermedades-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_ENFERMEDAD], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_ENFERMEDAD], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_ENFERMEDAD',
            'NOMBRE_ENFERMEDAD',
        ],
    ]) ?>

</div>
