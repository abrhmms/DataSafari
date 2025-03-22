<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Clase $model */

$this->title = $model->id_clase;
$this->params['breadcrumbs'][] = ['label' => 'Clases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clase-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_clase' => $model->id_clase], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_clase' => $model->id_clase], [
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
        'id_clase',
        'nombre',
        'descripcion',
        [
            'attribute' => 'id_filo',
            'label' => 'Filo Asociado',
            'value' => function ($model) {
                return $model->filo ? $model->filo->nombre : 'Sin filo';
            },
        ],
    ],
]) ?>


</div>
