<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap5;
?>
/** @var yii\web\View $this */
/** @var app\models\Members $model */
/** @var ActiveForm $form */
<div class="members">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-field">
        <h1 class="text-center">Signup Form</h1>

        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'firstname') ?>

        <?= $form->field($model, 'lastname') ?>

        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'password',['template' => '{label}<div class="input-group">{input}<div class="input-group-append"><span class="input-group-text"><i class="fa fa-eye toggle-password"></i></span>
         </div></div>{error}',])->passwordInput(['id' => 'password-field']) ?>
        <?= $form->field($model, 'confirm_password', [
         'template' => '{label}<div class="input-group">{input}<div class="input-group-append">
        <span class="input-group-text"><i class="fa fa-eye toggle-password"></i></span>
         </div></div>{error}',])->passwordInput(['id' => 'confirm-password']) ?>
          <?= $form->field($model, 'gender')->radioList(['male'=>'Male','female'=> 'Female','prefer_not_to_say'=> 'Prefer not to say']) ?>
        <br>
        

        <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary']) ?>
        </div>
        <div style= text-align:center><p>Already have an account <a class="btn btn-primary" href="http://localhost/blog/site/login" role="button">Login</a> </p>
    </div>
    

    <script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".toggle-password").forEach(function (eyeIcon) {
        eyeIcon.addEventListener("click", function () {
            let passwordField = this.closest(".input-group").querySelector("input");
            passwordField.type = passwordField.type === "password" ? "text" : "password";
            this.classList.toggle("fa-eye");
            this.classList.toggle("fa-eye-slash");
        });
    });
});
</script>



    <?php ActiveForm::end(); ?>
   



</div><!-- users -->