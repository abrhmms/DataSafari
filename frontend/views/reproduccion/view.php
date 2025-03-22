<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Reproduccion $model */

$this->title = $model->id_reproduccion;
$this->params['breadcrumbs'][] = ['label' => 'Reproduccions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="reproduccion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_reproduccion' => $model->id_reproduccion, 'id_animal_madre' => $model->id_animal_madre], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_reproduccion' => $model->id_reproduccion, 'id_animal_madre' => $model->id_animal_madre], [
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
            'id_reproduccion',
            'fecha_nacimiento',
            'estado_cria',
            'numero_crias',
            'id_animal_madre',
        ],
    ]) ?>

</div>
