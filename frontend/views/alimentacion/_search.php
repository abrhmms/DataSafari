<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\AlimentacionSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alimentacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_alimentacion') ?>

    <?= $form->field($model, 'nombre_alimento') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'unidad_medida') ?>

    <?= $form->field($model, 'frecuencia') ?>

    <?php // echo $form->field($model, 'id_animal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
