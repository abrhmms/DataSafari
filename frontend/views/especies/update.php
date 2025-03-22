<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Especies $model */

$this->title = 'Actualizar Especie: ' . $model->id_especies;
$this->params['breadcrumbs'][] = ['label' => 'Especies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_especies, 'url' => ['view', 'id_especies' => $model->id_especies]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="especies-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
