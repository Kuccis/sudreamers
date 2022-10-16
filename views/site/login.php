<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\models\LoginForm;
use yii\web\View;

/** @var View $this */
/** @var ActiveForm $form */
/** @var LoginForm $model */

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h1><?= Html::encode($this->title) ?></h1>

                <p><?= Yii::t('app', 'Please fill out the following fields to login:') ?></p>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'layout' => 'horizontal',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => 'col-lg-3 col-form-label mr-lg-3'],
                        'inputOptions' => ['class' => 'col-lg-3 form-control'],
                        'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                    ],
                    ]); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="d-flex justify-content-around align-items-center mb-4">
                        <div class="form-check">
                            <?= $form->field($model, 'rememberMe')->checkbox([
                                'template' => "<div class=\"col-lg-12 custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                            ]) ?>
                        </div>
                        <a href="#" class="mb-3"><?= Yii::t('app', 'Forgot password?') ?></a>
                    </div>

                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('app', 'Login'), ['class' => 'btn btn-primary col-lg-12', 'name' => 'login-button']) ?>
                    </div>

                    <div class="divider d-flex align-items-center my-2">
                        <p class="text-center fw-bold mx-3 mb-0 text-muted"><?= Yii::t('app', 'OR') ?></p>
                    </div>

                    <div class="form-group">
                        <?= Html::a(Yii::t('app', 'Register'), 'register', ['class' => 'btn btn-primaryLight col-lg-12', 'name' => 'register-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

