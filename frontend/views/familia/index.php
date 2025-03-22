<?php

use common\models\Familia;
use common\models\Orden;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\FamiliaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Familias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="familia-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Familia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            'descripcion',
            [
                'attribute' => 'id_orden',
                'label' => 'Orden',
                'value' => function ($model) {
                    return $model->orden ? $model->orden->nombre : 'No asignado';
                },
                'filter' => ArrayHelper::map(Orden::find()->all(), 'id_orden', 'nombre'),
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Familia $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_familia' => $model->id_familia]);
                }
            ],
        ],
    ]); ?>

</div>
