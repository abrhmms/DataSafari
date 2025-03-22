<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Genero $model */

$this->title = $model->id_genero;
$this->params['breadcrumbs'][] = ['label' => 'Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="genero-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_genero' => $model->id_genero], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_genero' => $model->id_genero], [
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
            //'id_familia',
            'nombre',
            'descripcion',
            [
                'attribute' => 'id_familia',
                'label' => 'Familia Asociada',
                'value' => function ($model) {
                    return $model->familia ? $model->familia->nombre : 'Sin Familia';
                },
            ],
        ],
    ]) ?>

</div>
