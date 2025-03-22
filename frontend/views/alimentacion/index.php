<?php

use common\models\Alimentacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\AlimentacionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Alimentacion';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alimentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Alimentacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        //'id_alimentacion',
        'nombre_alimento',
        'cantidad',
        'unidad_medida',
        'frecuencia',
        [
            'attribute' => 'id_animal',
            'label' => 'Animal',
            'value' => function ($model) {
                return $model->animal ? $model->animal->nombre : 'Sin asignar';
            }
        ],
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Alimentacion $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id_alimentacion' => $model->id_alimentacion, 'id_animal' => $model->id_animal]);
            }
        ],
    ],
]); ?>



</div>
