<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Reproduccion $model */

$this->title = 'Update Reproduccion: ' . $model->id_reproduccion;
$this->params['breadcrumbs'][] = ['label' => 'Reproduccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_reproduccion, 'url' => ['view', 'id_reproduccion' => $model->id_reproduccion, 'id_animal_madre' => $model->id_animal_madre]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reproduccion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
