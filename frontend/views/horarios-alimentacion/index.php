<?php

use common\models\HorariosAlimentacion;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\HorariosAlimentacionSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Horarios de Alimentación';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horarios-alimentacion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Horario de Alimentación', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hora',
            'fecha',
            'tipo_comida',
            [
                'attribute' => 'id_alimentacion',
                'value' => function ($model) {
                    return $model->alimentacion->nombre_alimento; // Muestra el nombre del alimento
                },
                'label' => 'Alimento'
            ],
            [
                'attribute' => 'id_especies',
                'value' => function ($model) {
                    return $model->especies->nombre_comun; // Muestra el nombre de la especie
                },
                'label' => 'Especie'
            ],
            [
                'attribute' => 'alimentado',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->alimentado 
                        ? '<span style="color: green; font-weight: bold;">✅ Alimentado</span>' 
                        : '<span style="color: red; font-weight: bold;">❌ Pendiente</span>';
                },
                'label' => 'Estado'
            ],
            [
                'class' => ActionColumn::className(),
                'template' => '{view} {update} {delete} {alimentar}', // Botón extra para alimentar
                'buttons' => [
                    'alimentar' => function ($url, $model, $key) {
                        if (!$model->alimentado) { // Solo muestra el botón si NO está alimentado
                            return Html::a(
                                '🍽️ Marcar como Alimentado', 
                                Url::to(['alimentar', 'id' => $model->id_horarios_alimentacion]), 
                                [
                                    'class' => 'btn btn-primary btn-sm',
                                    'data-confirm' => '¿Estás seguro de marcar este horario como alimentado?',
                                    'data-method' => 'post'
                                ]
                            );
                        }
                        return ''; // Si ya está alimentado, no muestra nada
                    },
                ],
'class' => 'yii\grid\ActionColumn',
    'urlCreator' => function ($action, $model, $key, $index) {
        return Url::to([$action, 'id_horarios_alimentacion' => $model->id_horarios_alimentacion]);
                }
            ],
            
        ],
    ]); ?>

</div>
