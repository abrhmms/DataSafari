<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Especies $model */

$this->title = $model->id_especies;
$this->params['breadcrumbs'][] = ['label' => 'Especies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="especies-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_especies' => $model->id_especies], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_especies' => $model->id_especies], [
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
            'id_especies',
            'nombre_cientifico',
            'nombre_comun',
            'longevidad',
            'semaforo_riesgo',
            'distribucion',
            'id_genero',
        ],
    ]) ?>

</div>
