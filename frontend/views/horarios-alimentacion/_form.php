<?php

use common\models\Alimentacion;
use common\models\Especies;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\HorariosAlimentacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="horarios-alimentacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hora')->textInput(['type' => 'time']) ?>

    <?= $form->field($model, 'fecha')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'tipo_comida')->dropDownList([
        'Desayuno' => 'Desayuno',
        'Almuerzo' => 'Almuerzo',
        'Cena' => 'Cena'
    ], ['prompt' => 'Seleccione un tipo de comida']) ?>

    <?= $form->field($model, 'id_alimentacion')->dropDownList(
        ArrayHelper::map(Alimentacion::find()->all(), 'id_alimentacion', 'nombre_alimento'),
        ['prompt' => 'Seleccione el alimento']
    )->label('Alimentación') ?>

    <?= $form->field($model, 'id_especies')->dropDownList(
        ArrayHelper::map(Especies::find()->all(), 'id_especies', 'nombre_comun'),
        ['prompt' => 'Seleccione la especie']
    )->label('Especie') ?>
    
    <?= $form->field($model, 'alimentado')->dropDownList([
    0 => '❌ Pendiente',
    1 => '✅ Alimentado'
], ['prompt' => 'Seleccione el estado']) ?>
<br>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
