<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Habitat $model */

$this->title = 'Actualizar Habitat: ' . $model->id_habitat;
$this->params['breadcrumbs'][] = ['label' => 'Habitats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_habitat, 'url' => ['view', 'id_habitat' => $model->id_habitat]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="habitat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
