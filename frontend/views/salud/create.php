<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Salud $model */

$this->title = 'Create Salud';
$this->params['breadcrumbs'][] = ['label' => 'Saluds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salud-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
