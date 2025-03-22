<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Orden $model */

$this->title = 'Actualizar Orden: ' . $model->id_orden;
$this->params['breadcrumbs'][] = ['label' => 'Orden', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_orden, 'url' => ['view', 'id_orden' => $model->id_orden]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="orden-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
