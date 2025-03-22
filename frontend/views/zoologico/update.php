<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Zoologico $model */

$this->title = 'Update Zoologico: ' . $model->id_zoologico;
$this->params['breadcrumbs'][] = ['label' => 'Zoologicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_zoologico, 'url' => ['view', 'id_zoologico' => $model->id_zoologico]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="zoologico-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
