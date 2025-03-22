<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Genero $model */

$this->title = 'Crear Genero';
$this->params['breadcrumbs'][] = ['label' => 'Generos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genero-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
