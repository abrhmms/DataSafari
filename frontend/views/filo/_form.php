<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="filo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">

        <div class="card-body">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese el nombre del filo'])->label('Nombre del Filo') ?>

            <?= $form->field($model, 'descripcion')->textarea(['rows' => 4, 'maxlength' => true, 'placeholder' => 'Breve descripción'])->label('Descripción') ?>
        </div>
        <div class="card-footer">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
