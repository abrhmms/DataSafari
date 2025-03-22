<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\HorariosAlimentacion $model */

$this->title = 'Actualizar Horario de Alimentacion: ' . $model->id_horarios_alimentacion;
$this->params['breadcrumbs'][] = ['label' => 'Horarios Alimentacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_horarios_alimentacion, 'url' => ['view', 'id_horarios_alimentacion' => $model->id_horarios_alimentacion, 'id_alimentacion' => $model->id_alimentacion, 'id_especies' => $model->id_especies]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="horarios-alimentacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
