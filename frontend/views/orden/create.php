<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Orden $model */

$this->title = 'Crear Orden';
$this->params['breadcrumbs'][] = ['label' => 'Ordens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orden-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
