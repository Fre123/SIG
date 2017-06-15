<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EstudianteProyectoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estudiante Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-proyecto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estudiante Proyecto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_PROYECTO',
            'ID_ESTUDIANTE',
            'FECHA_REGISTRO',
            'HORAS',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
