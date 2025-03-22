<?php

use common\models\Zoologico;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ZoologicoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Zoologicos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="zoologico-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Zoologico', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_zoologico',
            'nombre_zoologico',
            'ubicacion:ntext',
            'ciudad',
            'pais',
            //'telefono',
            //'horario_apertura',
            //'horario_cierre',
            //'imagen_ilustrativa:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Zoologico $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_zoologico' => $model->id_zoologico]);
                 }
            ],
        ],
    ]); ?>


</div>
