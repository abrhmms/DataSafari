<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Familia $model */

$this->title = 'Actualizar Familia: ' . $model->id_familia;
$this->params['breadcrumbs'][] = ['label' => 'Familias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_familia, 'url' => ['view', 'id_familia' => $model->id_familia]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="familia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
