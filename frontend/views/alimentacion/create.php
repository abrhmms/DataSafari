<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Alimentacion $model */

$this->title = 'Crear Alimentacion';
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alimentacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
