<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Genero $model */

$this->title = 'Actualizar Genero: ' . $model->id_genero;
$this->params['breadcrumbs'][] = ['label' => 'Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_genero, 'url' => ['view', 'id_genero' => $model->id_genero]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="genero-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
