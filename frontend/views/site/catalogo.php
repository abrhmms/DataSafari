<?php

/** @var yii\web\View $this */
/** @var app\models\Animal[] $animales */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;

$this->title = 'Catálogo de Animales';
$this->registerCssFile('@web/css/catalogo.css', ['depends' => [yii\web\AssetBundle::class]]);
?>

<div class="site-catalogo">
    <h1 class="display-5 mb-0">
        <span class="text-primary">Catálogo de Animales </span>del Parque del Pueblo
    </h1>

    <br><br>

    <!-- 🔎 Formulario de búsqueda -->
    <div class="search-container">
    <?php $form = ActiveForm::begin([
        'action' => ['catalogo'], // La acción donde buscará
        'method' => 'get',
        'id' => 'search-form', // Añadimos un ID al formulario
    ]); ?>

    <div class="search-input-container">
        <span class="search-icon">&#128269;</span>
        <?= $form->field($searchModel, 'nombre')->textInput([
            'placeholder' => 'Buscar por nombre',
            'class' => 'search-input',
        ])->label(false) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Buscar', [
            'class' => 'btn btn-primary',
        ]) ?>
        <?= Html::resetButton('Restablecer', [
            'class' => 'btn btn-reset',
            'type' => 'reset', // Asegúrate de que sea tipo "reset"
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

    <br><br>

    <div class="container">
        <div class="card__container">
            <?php if (!empty($dataProvider)): ?>
                <?php foreach ($dataProvider as $animal): ?>
                    <div class="card__article">
                        <?php if (!empty($animal->imagen_ilustrativa)): ?>
                            <img src="<?= Yii::getAlias('@web') . '/' . Html::encode($animal->imagen_ilustrativa) ?>"
                                alt="<?= Html::encode($animal->nombre) ?>" class="animal-image">
                        <?php else: ?>
                            <img src="<?= Yii::getAlias('@web') . '/img/default.png' ?>"
                                alt="Imagen no disponible" class="animal-image">
                        <?php endif; ?>
                        <div class="card__data">
                            <h2 class="card__title"><?= Html::encode($animal->nombre) ?></h2>
                            <ul class="card__attributes">
                                <li><strong>Edad:</strong> <?= Html::encode($animal->edad) ?> años</li>
                                <li><strong>Peso:</strong> <?= Html::encode($animal->peso) ?> kg</li>
                                <li><strong>Filo:</strong> <?= Html::encode($animal->filo ? $animal->filo->nombre : 'Desconocido') ?></li>
                                <li><strong>Clase:</strong> <?= Html::encode($animal->clase ? $animal->clase->nombre : 'Desconocido') ?></li>
                                <li><strong>Orden:</strong> <?= Html::encode($animal->orden ? $animal->orden->nombre : 'Desconocido') ?></li>
                                <li><strong>Familia:</strong> <?= Html::encode($animal->familia ? $animal->familia->nombre : 'Desconocido') ?></li>
                                <li><strong>Género:</strong> <?= Html::encode($animal->genero ? $animal->genero->nombre : 'Desconocido') ?></li>
                                <li><strong>Especie:</strong> <?= Html::encode($animal->especies->nombre_comun) ?></li>
                                <li><strong>Hábitat:</strong> <?= Html::encode($animal->habitat ? $animal->habitat->nombre : 'Desconocido') ?></li>
                            </ul>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No contamos con ese animal.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<br><br><br>

<script>
    // Script para asegurar que el formulario se restablezca correctamente
    document.querySelector('.btn-reset').addEventListener('click', function() {
        document.getElementById('search-form').reset(); // Restablece el formulario
        window.location.href = window.location.pathname; // Recarga la página sin parámetros
    });
</script>