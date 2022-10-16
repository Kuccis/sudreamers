<?php

use app\models\User;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\web\View;

/** @var View $this */
/** @var User $model */
/** @var ActiveForm $form */

$this->title = Yii::t('app', 'Register Form');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-register">
    <?php $form = ActiveForm::begin(); ?>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <h3><?= Yii::t('app', 'Register Form') ?></h3>

                    <p class="mb-4"><?= Yii::t('app', 'Welcome on Sudeten Dreamers Register page! All fields must be filled in for successful registration.') ?></p>

                    <?= $form->field($model, 'username')->textInput() ?>

                    <?= $form->field($model, 'email')->textInput() ?>

                    <?= $form->field($model, 'gender')->dropDownList(
                        ['0' => 'Muž', '1' => 'Žena'],   
                        ['prompt' => Yii::t('app', 'Choose gender')]   
                    ); ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>
                
                    <div class="form-group mt-5">
                        <?= Html::submitButton(Yii::t('app', 'Register'), ['class' => 'btn btn-primary col-lg-12']) ?>
                    </div>

                    <div class="divider d-flex align-items-center my-2">
                        <p class="text-center fw-bold mx-3 mb-0 text-muted"><?= Yii::t('app', 'OR') ?></p>
                    </div>

                    <div class="form-group">
                        <?= Html::a(Yii::t('app', 'Login'), 'login', ['class' => 'btn btn-primaryLight col-lg-12', 'name' => 'login-button']) ?>
                    </div>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>

</div>
