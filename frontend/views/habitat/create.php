<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Habitat $model */

$this->title = 'Crear Habitat';
$this->params['breadcrumbs'][] = ['label' => 'Habitats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="habitat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
