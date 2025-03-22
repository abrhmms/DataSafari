<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Animal $model */

$this->title = 'Actualizar Animal: ' . $model->id_animal;
$this->params['breadcrumbs'][] = ['label' => 'Animales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_animal, 'url' => ['view', 'id_animal' => $model->id_animal]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="animal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
