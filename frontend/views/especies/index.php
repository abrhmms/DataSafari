<?php

use common\models\Especies;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\EspeciesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Especies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="especies-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Especie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_especies',
            'nombre_cientifico',
            'nombre_comun',
            'longevidad',
            //'semaforo_riesgo',
            //'distribucion',
            //'imagen_ilustrativa:ntext',
            [
                'attribute' => 'id_genero',
                'label' => 'Genero Asociado',
                'value' => function ($model) {
                    return $model->genero ? $model->genero->nombre : 'Sin Genero';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Especies $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_especies' => $model->id_especies]);
                 }
            ],
        ],
    ]); ?>


</div>
