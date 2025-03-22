<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Zoologico $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="zoologico-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_zoologico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ubicacion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'horario_apertura')->textInput() ?>

    <?= $form->field($model, 'horario_cierre')->textInput() ?>

    <?= $form->field($model, 'imagen_ilustrativa')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
