<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\EspeciesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="especies-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_especies') ?>

    <?= $form->field($model, 'nombre_cientifico') ?>

    <?= $form->field($model, 'nombre_comun') ?>

    <?= $form->field($model, 'longevidad') ?>

    <?= $form->field($model, 'semaforo_riesgo') ?>

    <?php // echo $form->field($model, 'distribucion') ?>

    <?php // echo $form->field($model, 'imagen_ilustrativa') ?>

    <?php // echo $form->field($model, 'id_genero') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
