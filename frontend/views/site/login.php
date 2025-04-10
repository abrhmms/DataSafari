<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p><?= Yii::t('app', 'Please fill out the following fields to login:') ?></p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])
                    ->label(Yii::t('app', 'Username')) ?>

                <?= $form->field($model, 'password')->passwordInput()
                    ->label(Yii::t('app', 'Password')) ?>

                <?= $form->field($model, 'rememberMe')->checkbox()
                    ->label(Yii::t('app', 'Remember Me')) ?>

                <div class="my-1 mx-0" style="color:#999;">
                    <?= Yii::t('app', 'If you forgot your password you can {link}.', [
                        'link' => Html::a(Yii::t('app', 'reset it'), ['site/request-password-reset'])
                    ]) ?>
                    <br>
                    <?= Yii::t('app', 'Need new verification email? {link}', [
                        'link' => Html::a(Yii::t('app', 'Resend'), ['site/resend-verification-email'])
                    ]) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
