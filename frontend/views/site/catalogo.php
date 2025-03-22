<?php

/** @var yii\web\View $this */
/** @var app\models\Animal[] $animales */

use yii\helpers\Html;

$this->title = 'Catálogo de Animales';
$this->registerCssFile('@web/css/catalogo.css', ['depends' => [yii\web\AssetBundle::class]]);
?>

<div class="site-catalogo">
    <h1 class="display-5 mb-0">
        <span class="text-primary">Catálogo de Animales </span>del Parque del Pueblo
    </h1>

    <br><br>
    <div class="container">
        <div class="card__container">
            <?php if (!empty($animales)): ?>
                <?php foreach ($animales as $animal): ?>
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
                <p>No hay animales registrados en el catálogo.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<br><br><br>