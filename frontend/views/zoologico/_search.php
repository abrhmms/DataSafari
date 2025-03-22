<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ZoologicoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="zoologico-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_zoologico') ?>

    <?= $form->field($model, 'nombre_zoologico') ?>

    <?= $form->field($model, 'ubicacion') ?>

    <?= $form->field($model, 'ciudad') ?>

    <?= $form->field($model, 'pais') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'horario_apertura') ?>

    <?php // echo $form->field($model, 'horario_cierre') ?>

    <?php // echo $form->field($model, 'imagen_ilustrativa') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
