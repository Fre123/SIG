<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\EstudianteProyecto */

$this->title = 'Create Estudiante Proyecto';
$this->params['breadcrumbs'][] = ['label' => 'Estudiante Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-proyecto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
