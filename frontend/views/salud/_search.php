<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SaludSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="salud-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_registro') ?>

    <?= $form->field($model, 'tratamiento') ?>

    <?= $form->field($model, 'fecha_revision') ?>

    <?= $form->field($model, 'proxima_revision') ?>

    <?= $form->field($model, 'id_animal') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'estado_salud') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
