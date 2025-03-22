<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Zoologico $model */

$this->title = $model->id_zoologico;
$this->params['breadcrumbs'][] = ['label' => 'Zoologicos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="zoologico-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_zoologico' => $model->id_zoologico], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_zoologico' => $model->id_zoologico], [
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
            'id_zoologico',
            'nombre_zoologico',
            'ubicacion:ntext',
            'ciudad',
            'pais',
            'telefono',
            'horario_apertura',
            'horario_cierre',
            'imagen_ilustrativa:ntext',
        ],
    ]) ?>

</div>
