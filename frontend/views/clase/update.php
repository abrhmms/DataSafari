<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Clase $model */

$this->title = 'Actualizar Clase: ' . $model->id_clase;
$this->params['breadcrumbs'][] = ['label' => 'Clases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_clase, 'url' => ['view', 'id_clase' => $model->id_clase]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="clase-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
