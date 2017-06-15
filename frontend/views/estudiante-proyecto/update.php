<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\EstudianteProyecto */

$this->title = 'Update Estudiante Proyecto: ' . $model->ID_PROYECTO;
$this->params['breadcrumbs'][] = ['label' => 'Estudiante Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_PROYECTO, 'url' => ['view', 'ID_PROYECTO' => $model->ID_PROYECTO, 'ID_ESTUDIANTE' => $model->ID_ESTUDIANTE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estudiante-proyecto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
