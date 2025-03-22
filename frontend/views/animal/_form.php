<?php

use common\models\Clase;
use common\models\Especies;
use common\models\Familia;
use common\models\Filo;
use common\models\Genero;
use common\models\Habitat;
use common\models\Orden;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \yii\helpers\Url;


/** @var yii\web\View $this */
/** @var common\models\Animal $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="animal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <?= $form->field($model, 'peso')->textInput() ?>

    <?= $form->field($model, 'punto_id')->dropDownList(
    \yii\helpers\ArrayHelper::map(\common\models\PuntosMapa::find()->all(), 'id', 'nombre'),
    ['prompt' => 'Selecciona una Zona']
) ?>


    <label>Selecciona Filo</label>
    <?= Html::dropDownList(
        'id_filo',
        'id_filo',
        ArrayHelper::map(Filo::find()->all(), 'id_filo', 'nombre'),
        [
            'prompt' => 'Seleccione Uno',
            'class' => 'form-control',
            'id' => 'id_filo',
            'onChange' => 'getClases()',

        ]
    ) ?>

    <label>Selecciona Clase</label>
    <?= Html::dropDownList(
        'id_clase',
        'id_clase',
        [],
        [
            'prompt' => 'Seleccione Uno',
            'class' => 'form-control',
            'id' => 'id_clase',
            'onChange' => 'getOrdenes()'
        ]
    ) ?>

    <label>Selecciona Orden</label>
    <?= Html::dropDownList(
        'id_orden',
        null,
        [],
        [
            'prompt' => 'Seleccione Uno',
            'class' => 'form-control',
            'id' => 'id_orden',
            'onChange' => 'getFamilias()'
        ]
    ) ?>

    <label>Selecciona Familia</label>
    <?= Html::dropDownList(
        'id_familia',
        null,
        [],
        [
            'prompt' => 'Seleccione Uno',
            'class' => 'form-control',
            'id' => 'id_familia',
            'onChange' => 'getGeneros()'
        ]
    ) ?>

    <label>Selecciona Género</label>
    <?= Html::dropDownList(
        'id_genero',
        null,
        [],
        [
            'prompt' => 'Seleccione Uno',
            'class' => 'form-control',
            'id' => 'id_genero',
            'onChange' => 'getEspecies()'
        ]
    ) ?>

    <?= $form->field($model, 'id_especies')->dropDownList([], ['prompt' => 'Seleccione Uno', 'id' => 'id_especies'])->label('Especie'); ?>


    <?=
    $form->field($model, 'id_habitat')->dropDownList(ArrayHelper::map(Habitat::find()->all(), 'id_habitat', 'nombre'), ['prompt' => 'Seleccione Uno'])
        ->label('Habitat');;


    ?>
    <br>
    <?=
    $form->field($model, 'imagen_ilustrativa')->fileInput()
    ?>


    <?php if ($model->imagen_ilustrativa): ?>
        <div>
            <label>Imagen Actual:</label><br>
            <img src="<?= Yii::getAlias('@web') . '/' . $model->imagen_ilustrativa ?>" alt="Imagen del Animal" style="max-width: 200px;">
        </div>
    <?php endif; ?>

    <div class="form-group">
        <br>
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function getClases() {
        $('#id_clase option').each(function() {
            if ($(this).val() > 0) {
                $(this).remove();
            }
        });
        $.ajax({
            url: '<?= Url::to(['animal/options-clase']) ?>',
            data: {
                id_filo: $("#id_filo").val()
            },
            type: "POST",
            success: function(data) {
                for (let i = 0; i < data.length; i++) {
                    $('#id_clase').append($('<option>', {
                        value: data[i].id_clase,
                        text: data[i].nombre,
                    }));
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function getOrdenes() {
        $('#id_orden option').each(function() {
            if ($(this).val() > 0) $(this).remove();
        });
        $.ajax({
            url: '<?= Url::to(['animal/options-orden']) ?>',
            data: {
                id_clase: $("#id_clase").val()
            },
            type: "POST",
            success: function(data) {
                for (let i = 0; i < data.length; i++) {
                    $('#id_orden').append($('<option>', {
                        value: data[i].id_orden,
                        text: data[i].nombre
                    }));
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function getFamilias() {
        $('#id_familia option').each(function() {
            if ($(this).val() > 0) $(this).remove();
        });
        $.ajax({
            url: '<?= Url::to(['animal/options-familia']) ?>',
            data: {
                id_orden: $("#id_orden").val()
            },
            type: "POST",
            success: function(data) {
                for (let i = 0; i < data.length; i++) {
                    $('#id_familia').append($('<option>', {
                        value: data[i].id_familia,
                        text: data[i].nombre
                    }));
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function getGeneros() {
        $('#id_genero option').each(function() {
            if ($(this).val() > 0) $(this).remove();
        });
        $.ajax({
            url: '<?= Url::to(['animal/options-genero']) ?>',
            data: {
                id_familia: $("#id_familia").val()
            },
            type: "POST",
            success: function(data) {
                for (let i = 0; i < data.length; i++) {
                    $('#id_genero').append($('<option>', {
                        value: data[i].id_genero,
                        text: data[i].nombre
                    }));
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function getEspecies() {
        $('#id_especies option').each(function() {
            if ($(this).val() > 0) $(this).remove();
        });
        $.ajax({
            url: '<?= Url::to(['animal/options-especies']) ?>',
            data: {
                id_genero: $("#id_genero").val()
            },
            type: "POST",
            success: function(data) {
                for (let i = 0; i < data.length; i++) {
                    $('#id_especies').append($('<option>', {
                        value: data[i].id_especies,
                        text: data[i].nombre_comun
                    }));
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }
</script>