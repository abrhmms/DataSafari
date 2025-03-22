<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Animal $model */

$this->title = $model->id_animal;
$this->params['breadcrumbs'][] = ['label' => 'Animales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="animal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id_animal' => $model->id_animal], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id_animal' => $model->id_animal], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Seguro que quieres eliminar este animal?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_animal',
            'nombre',
            'edad',
            'peso',
            'imagen_ilustrativa:ntext',
            [
                'label' => 'Filo',
                'value' => $model->especies->genero->familia->orden->clase->filo->nombre ?? 'No disponible',
            ],
            [
                'label' => 'Clase',
                'value' => $model->especies->genero->familia->orden->clase->nombre ?? 'No disponible',
            ],
            [
                'label' => 'Orden',
                'value' => $model->especies->genero->familia->orden->nombre ?? 'No disponible',
            ],
            [
                'label' => 'Familia',
                'value' => $model->especies->genero->familia->nombre ?? 'No disponible',
            ],
            [
                'label' => 'Género',
                'value' => $model->especies->genero->nombre ?? 'No disponible',
            ],
            [
                'label' => 'Especie',
                'value' => $model->especies->nombre_cientifico ?? 'No disponible',
            ],
            [
                'label' => 'Hábitat',
                'value' => $model->habitat->nombre ?? 'No disponible',
            ],
            'id_especies',
            'id_habitat',
        ],
    ]) ?>

</div>
