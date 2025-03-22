<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\HorariosAlimentacionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="horarios-alimentacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_horarios_alimentacion') ?>

    <?= $form->field($model, 'hora') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'tipo_comida') ?>

    <?= $form->field($model, 'id_alimentacion') ?>

    <?php // echo $form->field($model, 'id_especies') ?>

    <?php // echo $form->field($model, 'alimentado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
