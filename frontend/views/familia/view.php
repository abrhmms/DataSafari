<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Familia $model */

$this->title = $model->id_familia;
$this->params['breadcrumbs'][] = ['label' => 'Familias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="familia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_familia' => $model->id_familia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_familia' => $model->id_familia], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que quieres eliminar esta familia?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_familia',
            'nombre',
            'descripcion',
            [
                'attribute' => 'id_orden',
                'label' => 'Orden Asociado',
                'value' => function ($model) {
                    return $model->orden ? $model->orden->nombre : 'Sin Orden';
                },
            ],
        ],
    ]) ?>

</div>
