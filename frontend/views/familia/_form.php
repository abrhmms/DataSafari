<?php

use common\models\Orden;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Familia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="familia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_orden')->dropDownList(
        ArrayHelper::map(Orden::find()->all(), 'id_orden', 'nombre'),
        ['prompt' => 'Seleccione un Orden']
    )->label('Orden') ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
