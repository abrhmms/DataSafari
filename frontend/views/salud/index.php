<?php

use common\models\Animal;
use common\models\Salud;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\Animales;

/** @var yii\web\View $this */
/** @var common\models\SaludSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Historial de Salud';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salud-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar Nuevo Historial', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id_animal',
                'label' => 'Animal',
                'value' => function ($model) {
                    return $model->animal->nombre; // Se asume que hay una relación con Animales
                },
                'filter' => ArrayHelper::map(Animal::find()->all(), 'id_animal', 'nombre'),
            ],
            [
                'attribute' => 'tratamiento',
                'label' => 'Tratamiento',
                'format' => 'ntext',
            ],
            [
                'attribute' => 'fecha_revision',
                'label' => 'Última Revisión',
                'format' => ['date', 'php:d/m/Y'],
            ],
            [
                'attribute' => 'proxima_revision',
                'label' => 'Próxima Revisión',
                'format' => ['date', 'php:d/m/Y'],
            ],
            [
                'attribute' => 'estado_salud',
                'label' => 'Estado de Salud',
                'contentOptions' => function ($model) {
                    $color = match ($model->estado_salud) {
                        'Estable' => 'green',
                        'En observación' => 'orange',
                        'Crítico' => 'red',
                        default => 'black',
                    };
                    return ['style' => "color: $color; font-weight: bold;"];
                },
                'filter' => ['Estable' => 'Estable', 'En observación' => 'En observación', 'Crítico' => 'Crítico'],
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Salud $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_registro' => $model->id_registro, 'id_animal' => $model->id_animal]);
                 }
            ],
        ],
    ]); ?>

</div>
