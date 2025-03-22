<?php

use yii\bootstrap5\Html;

 if (!empty($animales)): ?>
    <div class="container">
        <div class="card__container">
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
        </div>
    </div>
<?php else: ?>
    <p>No hay animales registrados en esta zona.</p>
<?php endif; ?>
