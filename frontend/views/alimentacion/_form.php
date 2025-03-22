<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Alimentacion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alimentacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_alimento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantidad')->textInput(['type' => 'number', 'step' => '0.01']) ?>

    <?= $form->field($model, 'unidad_medida')->dropDownList([
        'kg' => 'Kilogramos',
        'g' => 'Gramos',
        'l' => 'Litros',
        'ml' => 'Mililitros'
    ], ['prompt' => 'Seleccione la unidad']) ?>

<?= $form->field($model, 'frecuencia')->textInput([
    'type' => 'number',
    'min' => 1, // No puede ser menor a 1 hora
    'step' => 1, // Solo permite valores enteros
    'placeholder' => 'Cada cuántas horas se debe alimentar'
]) ?>


    <?= $form->field($model, 'id_animal')->dropDownList(
        ArrayHelper::map(common\models\Animal::find()->all(), 'id_animal', 'nombre'),
        ['prompt' => 'Seleccione un animal']
    )->label('Animal') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>