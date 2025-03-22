<?php

use common\models\Familia;
use common\models\Genero;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var common\models\GeneroSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Generos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genero-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Genero', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_genero',
            'nombre',
            'descripcion',
            [
                'attribute' => 'id_familia',
                'label' => 'Familia Asociada',
                'value' => function ($model) {
                    return $model->familia ? $model->familia->nombre : 'No asignado';
                },
                'filter' => ArrayHelper::map(Familia::find()->all(), 'id_familia', 'nombre'),
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Genero $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_genero' => $model->id_genero]);
                 }
            ],
        ],
    ]); ?>


</div>
<br><br><br>