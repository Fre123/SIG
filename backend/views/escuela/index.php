<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EscuelaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Escuelas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escuela-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Escuela', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID_ESCUELA',
            'NOMBRE_ESCUELA',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
