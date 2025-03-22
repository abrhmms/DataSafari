<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\HorariosAlimentacion $model */

$this->title = 'Crear Horario de Alimentacion';
$this->params['breadcrumbs'][] = ['label' => 'Horarios Alimentacion', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="horarios-alimentacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
