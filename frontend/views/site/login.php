<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */


use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Inicio de Sesión';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Por favor, complete los siguientes campos para iniciar sesión:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Nombre de usuario') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Recordarme') ?>

                <div class="my-1 mx-0" style="color:#999;">
                    Si olvidaste tu contraseña, puedes <?= Html::a('restablecerla', ['index.php/site/request-password-reset']) ?>.
                    <br>
                    ¿Necesitas un nuevo correo de verificación? <?= Html::a('Reenviar', ['index.php/site/resend-verification-email']) ?>
                    <br>
                    ¿No tienes cuenta? <?= Html::a('Registrate', ['index.php/site/signup']) ?>

                </div>
                <br>
                <div class="form-group">
                    <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
