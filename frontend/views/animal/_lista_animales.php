<?php
use yii\bootstrap5\Html;

if (!empty($animales)): ?>
    <div class="animales-container"> <!-- Cambiamos el contenedor a una clase más específica -->
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
<?php else: ?>
    <p>No hay animales registrados en esta zona.</p>
<?php endif; ?>

<style>
.animales-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* 2 columnas */
    gap: 20px; /* Espacio entre tarjetas */
    padding: 20px; /* Espacio interno */
    width: 100%; /* Asegura que el contenedor ocupe todo el ancho disponible */
}

.card__article {
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    width: 100%; /* Ocupa todo el ancho disponible */
}

.animal-image {
    width: 100%;
    height: 250px; /* Altura fija para las imágenes */
    object-fit: cover; /* Ajusta la imagen sin distorsionarla */
    border-bottom: 1px solid #ddd;
}

.card__data {
    padding: 15px;
}

.card__title {
    font-size: 1.5em;
    margin-bottom: 10px;
    color: #2E7D32;
}

.card__attributes {
    list-style: none;
    padding: 0;
    margin: 0;
}

.card__attributes li {
    margin-bottom: 8px;
    font-size: 0.9em;
    color: #555;
}

.card__attributes li strong {
    color: #333;
}
</style>
