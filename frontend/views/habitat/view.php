<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Habitat $model */

$this->title = $model->id_habitat;
$this->params['breadcrumbs'][] = ['label' => 'Habitats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="habitat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_habitat' => $model->id_habitat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_habitat' => $model->id_habitat], [
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
            'id_habitat',
            'nombre',
            'descripcion:ntext',
            'tipo',
            'ubicacion',
            'imagen_ilustrativa:ntext',
            'fecha_registro',
        ],
    ]) ?>

</div>
