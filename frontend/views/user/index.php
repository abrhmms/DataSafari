<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\UserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'id',
            'label' => 'ID Usuario',
        ],
        [
            'attribute' => 'username',
            'label' => 'Nombre de Usuario',
        ],
        [
            'attribute' => 'email',
            'format' => 'email',
            'label' => 'Correo Electrónico',
        ],
        [
            'attribute' => 'rol',
            'label' => 'Rol',
            'value' => function ($model) {
                // Si tienes nombres en la BD como "admin", "cuidador", "veterinario", los mapeamos a textos más amigables
                $roles = [
                    'admin' => 'Administrador',
                    'cuidador' => 'Cuidador',
                    'veterinario' => 'Veterinario',
                ];
                return isset($roles[$model->rol]) ? $roles[$model->rol] : 'Desconocido';
            },
            'filter' => [
                'cuidador' => 'Cuidador',
                'veterinario' => 'Veterinario',
            ],
        ],
        
        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, User $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            }
        ],
    ],
]); ?>
<br><br><br>

</div>
