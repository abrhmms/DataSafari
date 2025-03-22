<?php

use common\models\Clase;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ClaseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Gestión de Clases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clase-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Nueva Clase', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            'descripcion',
            [
                'attribute' => 'id_filo',
                'label' => 'Filo Asociado',
                'value' => function ($model) {
                    return $model->filo ? $model->filo->nombre : 'Sin filo';
                },
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Clase $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_clase' => $model->id_clase]);
                }
            ],
        ],
    ]); ?>

</div>
