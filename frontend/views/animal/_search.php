<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AnimalSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="animal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['catalogo'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_animal') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'edad') ?>

    <?= $form->field($model, 'peso') ?>

    <?= $form->field($model, 'imagen_ilustrativa') ?>

    <?php // echo $form->field($model, 'id_especies') ?>

    <?php // echo $form->field($model, 'id_habitat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
