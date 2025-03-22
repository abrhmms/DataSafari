<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Reproduccion $model */

$this->title = 'Create Reproduccion';
$this->params['breadcrumbs'][] = ['label' => 'Reproduccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reproduccion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
