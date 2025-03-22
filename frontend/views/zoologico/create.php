<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Zoologico $model */

$this->title = 'Create Zoologico';
$this->params['breadcrumbs'][] = ['label' => 'Zoologicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zoologico-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
