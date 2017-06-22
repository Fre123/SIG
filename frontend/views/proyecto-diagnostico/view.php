<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Proyecto */

$this->title = $model->ID_PROYECTO;
$this->params['breadcrumbs'][] = ['label' => 'Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_PROYECTO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_PROYECTO], [
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
            'NOMBRE_PROYECTO',
            'ESTADO_CUMPLIMIENTO_PROYECTO',
            'FECHA_INICIO_PROYECTO',
            'FECHA_FIN_PROYECTO',
            'PORCENTAJE_EJECUCION_PROYECTO',
        ],
    ]) ?>

</div>
