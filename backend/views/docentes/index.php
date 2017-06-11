<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DocentesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docentes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Docentes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_DOCENTES',
            'ID_ESCUELA',
            'NOMBRE_DOCENTES',
            'CEDULA_DOCENTE',
            'SEXO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
