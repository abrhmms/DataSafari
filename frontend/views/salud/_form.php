<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Salud $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="salud-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tratamiento')->textarea(['rows' => 6])->label('Descripción del Tratamiento') ?>

    <?= $form->field($model, 'fecha_revision')->input('date')->label('Fecha de Revisión') ?>

    <?= $form->field($model, 'proxima_revision')->input('date')->label('Próxima Revisión') ?>

    <?= $form->field($model, 'id_animal')->dropDownList(
        \yii\helpers\ArrayHelper::map(\common\models\Animal::find()->all(), 'id_animal', 'nombre'),
        ['prompt' => 'Seleccione un animal']
    )->label('Animal') ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 4])->label('Observaciones') ?>

    <?= $form->field($model, 'estado_salud')->dropDownList(
        ['Estable' => 'Estable', 'En observación' => 'En observación', 'Crítico' => 'Crítico'],
        ['prompt' => 'Seleccione el estado de salud']
    )->label('Estado de Salud') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>