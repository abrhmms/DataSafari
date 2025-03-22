<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Salud $model */

$this->title = $model->id_registro;
$this->params['breadcrumbs'][] = ['label' => 'Saluds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="salud-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_registro' => $model->id_registro, 'id_animal' => $model->id_animal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_registro' => $model->id_registro, 'id_animal' => $model->id_animal], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_registro',
            'tratamiento:ntext',
            'fecha_revision',
            'proxima_revision',
            'id_animal',
            'observaciones:ntext',
            'estado_salud',
        ],
    ]) ?>

</div>
