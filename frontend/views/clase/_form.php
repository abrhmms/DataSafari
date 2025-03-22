<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Filo;
?>

<div class="formulario-clasificacion">

    <?php $form = ActiveForm::begin(); ?>

    <div class="card">

        <div class="card-body">
            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese el nombre de la clasificación'])->label('Nombre de la Clasificación') ?>

            <?= $form->field($model, 'descripcion')->textarea(['rows' => 4, 'maxlength' => true, 'placeholder' => 'Breve descripción'])->label('Descripción') ?>

            <?= $form->field($model, 'id_filo')->dropDownList(
                ArrayHelper::map(Filo::find()->all(), 'id_filo', 'nombre'),
                ['prompt' => 'Seleccione un filo']
            )->label('Filo') ?>
        </div>
        <div class="card-footer">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
