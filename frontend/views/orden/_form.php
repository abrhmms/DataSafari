<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Clase;

/** @var yii\web\View $this */
/** @var common\models\Orden $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="orden-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_clase')->dropDownList(
        ArrayHelper::map(Clase::find()->all(), 'id_clase', 'nombre'),
        ['prompt' => 'Seleccione una clase']
    )->label('Clase') ?>
<br>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
