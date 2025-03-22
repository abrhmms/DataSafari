<?php

use common\models\Orden;
use common\models\Clase;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\OrdenSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Órdenes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orden-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Orden', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            'descripcion',
            [
                'attribute' => 'id_clase',
                'label' => 'Clase Asociada',
                'value' => function ($model) {
                    return $model->clase ? $model->clase->nombre : 'No asignado';
                },
                'filter' => ArrayHelper::map(Clase::find()->all(), 'id_clase', 'nombre'),
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Orden $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_orden' => $model->id_orden]);
                }
            ],
        ],
    ]); ?>

</div>
