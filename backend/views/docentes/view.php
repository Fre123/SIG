<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Docentes */

$this->title = $model->ID_DOCENTES;
$this->params['breadcrumbs'][] = ['label' => 'Docentes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_DOCENTES], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_DOCENTES], [
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
            'ID_DOCENTES',
            'ID_ESCUELA',
            'NOMBRE_DOCENTES',
            'CEDULA_DOCENTE',
            'SEXO',
        ],
    ]) ?>

</div>
