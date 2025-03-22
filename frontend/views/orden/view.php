<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Orden $model */

$this->title = $model->id_orden;
$this->params['breadcrumbs'][] = ['label' => 'Ordens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orden-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_orden' => $model->id_orden], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_orden' => $model->id_orden], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro que quieres eliminar esta Orden?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_orden',
            'nombre',
            'descripcion',
            'descripcion',
            [
                'attribute' => 'id_clase',
                'label' => 'Clase Asociado',
                'value' => function ($model) {
                    return $model->clase ? $model->clase->nombre : 'Sin Clase';
                },
            ],
        ],
    ]) ?>

</div>
