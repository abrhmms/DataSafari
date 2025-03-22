<?php

use common\models\Habitat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\HabitatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Habitats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="habitat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Habitat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_habitat',
            'nombre',
            'descripcion:ntext',
            'tipo',
            'ubicacion',
            //'imagen_ilustrativa:ntext',
            //'fecha_registro',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Habitat $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_habitat' => $model->id_habitat]);
                 }
            ],
        ],
    ]); ?>


</div>
