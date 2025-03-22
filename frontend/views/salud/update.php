<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Salud $model */

$this->title = 'Update Salud: ' . $model->id_registro;
$this->params['breadcrumbs'][] = ['label' => 'Saluds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_registro, 'url' => ['view', 'id_registro' => $model->id_registro, 'id_animal' => $model->id_animal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salud-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
