<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Filo $model */

$this->title = 'Actualizar Filo: ' . $model->id_filo;
$this->params['breadcrumbs'][] = ['label' => 'Filos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_filo, 'url' => ['view', 'id_filo' => $model->id_filo]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="filo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
