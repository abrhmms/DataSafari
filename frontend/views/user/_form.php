<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('Nombre de usuario') ?>

    <?= $form->field($model, 'password_hash')->passwordInput()->label('Contraseña') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Correo electrónico') ?>


    <?= $form->field($model, 'rol')->dropDownList([ 'admin' => 'Admin', 'cuidador' => 'Cuidador', 'veterinario' => 'Veterinario', ], ['prompt' => '']) ?>

    <br>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
