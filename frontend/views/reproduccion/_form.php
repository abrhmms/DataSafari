<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Reproduccion $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="reproduccion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_nacimiento')->textInput() ?>

    <?= $form->field($model, 'estado_cria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_crias')->textInput() ?>

    <?= $form->field($model, 'id_animal_madre')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
