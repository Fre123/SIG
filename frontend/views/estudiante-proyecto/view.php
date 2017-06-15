<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstudianteProyecto */

$this->title = $model->ID_PROYECTO;
$this->params['breadcrumbs'][] = ['label' => 'Estudiante Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-proyecto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID_PROYECTO' => $model->ID_PROYECTO, 'ID_ESTUDIANTE' => $model->ID_ESTUDIANTE], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID_PROYECTO' => $model->ID_PROYECTO, 'ID_ESTUDIANTE' => $model->ID_ESTUDIANTE], [
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
            'ID_PROYECTO',
            'ID_ESTUDIANTE',
            'FECHA_REGISTRO',
            'HORAS',
        ],
    ]) ?>

</div>
