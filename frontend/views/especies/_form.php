<?php

use common\models\Genero;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

    $generos = ArrayHelper::map(Genero::find()->all(), 'id_genero', 'nombre');

/** @var yii\web\View $this */
/** @var common\models\Especies $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="especies-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_cientifico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_comun')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longevidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'semaforo_riesgo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'distribucion')->textInput(['maxlength' => true]) ?>


<!-- Campo de selección de género -->
<?= $form->field($model, 'id_genero')->dropDownList(
    $generos,
    ['prompt' => 'Seleccione un género']
)->label('Genero') ?>
<br>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<br><br>