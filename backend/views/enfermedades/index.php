<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EnfermedadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enfermedades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enfermedades-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Enfermedades', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ENFERMEDAD',
            'NOMBRE_ENFERMEDAD',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
