<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProyectoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
 

    <p>
        <?= Html::a('Create Proyecto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PROYECTO',
            'NOMBRE_PROYECTO',
            'ESTADO_CUMPLIMIENTO_PROYECTO',
            'FECHA_INICIO_PROYECTO',
            'FECHA_FIN_PROYECTO',
            // 'PORCENTAJE_EJECUCION_PROYECTO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
