<?php

use common\models\Reproduccion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\ReproduccionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Reproduccions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reproduccion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Reproduccion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_reproduccion',
            'fecha_nacimiento',
            'estado_cria',
            'numero_crias',
            'id_animal_madre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Reproduccion $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_reproduccion' => $model->id_reproduccion, 'id_animal_madre' => $model->id_animal_madre]);
                 }
            ],
        ],
    ]); ?>


</div>
