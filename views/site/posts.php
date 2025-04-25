<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Posts $model */
/** @var ActiveForm $form */
?>
<br>
<div class="posts mt-5">
    <h1 class="text-center">Register your post here</h1>

    <?php $form = ActiveForm::begin(); ?>


        <?= $form->field($model, 'title') ?><br>
        <?= $form->field($model, 'description') ?><br>
       
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- posts -->
