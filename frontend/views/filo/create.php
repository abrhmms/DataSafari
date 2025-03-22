<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Filo $model */

$this->title = 'Crear Filo';
$this->params['breadcrumbs'][] = ['label' => 'Filos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="filo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
