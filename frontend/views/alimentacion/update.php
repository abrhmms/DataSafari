<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Alimentacion $model */

$this->title = 'Actualizar Alimentacion: ' . $model->id_alimentacion;
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_alimentacion, 'url' => ['view', 'id_alimentacion' => $model->id_alimentacion, 'id_animal' => $model->id_animal]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="alimentacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
