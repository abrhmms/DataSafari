<?php

use yii\helpers\Html;

use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\HorariosAlimentacion $model */

$this->title = 'Horario de Alimentación #' . $model->id_horarios_alimentacion;
$this->params['breadcrumbs'][] = ['label' => 'Horarios de Alimentación', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="horarios-alimentacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 
            'id_horarios_alimentacion' => $model->id_horarios_alimentacion, 
            'id_alimentacion' => $model->id_alimentacion, 
            'id_especies' => $model->id_especies], 
            ['class' => 'btn btn-primary']) 
        ?>

        <?= Html::a('Eliminar', ['delete', 
            'id_horarios_alimentacion' => $model->id_horarios_alimentacion, 
            'id_alimentacion' => $model->id_alimentacion, 
            'id_especies' => $model->id_especies], 
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Estás seguro de que deseas eliminar este horario de alimentación?',
                    'method' => 'post',
                ],
            ]) 
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Hora de Alimentación',
                'value' => Yii::$app->formatter->asTime($model->hora, 'php:H:i A'),
            ],
            [
                'label' => 'Fecha de Alimentación',
                'value' => Yii::$app->formatter->asDate($model->fecha, 'php:d/m/Y'),
            ],
            [
                'label' => 'Tipo de Comida',
                'value' => $model->tipo_comida,
            ],
            [
                'label' => 'Especie',
                'value' => $model->especies ? $model->especies->nombre_comun : 'No especificado',
            ],
            [
                'label' => 'Tipo de Alimentación',
                'value' => $model->alimentacion ? $model->alimentacion->nombre_alimento : 'No especificado',
            ],
            [
                'attribute' => 'alimentado',
                'value' => function ($model) {
                    return $model->alimentado ? 'Sí' : 'No';
                },
            ],
    
            
        ],
    ]) ?>

</div>
