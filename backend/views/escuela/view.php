<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Escuela */

$this->title = $model->ID_ESCUELA;
$this->params['breadcrumbs'][] = ['label' => 'Escuelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escuela-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID_ESCUELA], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->ID_ESCUELA], [
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
            'ID_ESCUELA',
            'NOMBRE_ESCUELA',
        ],
    ]) ?>

</div>
