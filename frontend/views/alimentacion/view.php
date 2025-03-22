<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Alimentacion $model */

$this->title = $model->id_alimentacion;
$this->params['breadcrumbs'][] = ['label' => 'Alimentacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alimentacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_alimentacion' => $model->id_alimentacion, 'id_animal' => $model->id_animal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_alimentacion' => $model->id_alimentacion, 'id_animal' => $model->id_animal], [
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
            'id_alimentacion',
            'nombre_alimento',
            'cantidad',
            'unidad_medida',
            'frecuencia',
            'id_animal',
        ],
    ]) ?>

</div>
