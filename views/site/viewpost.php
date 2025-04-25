<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var ActiveForm $form */
?>
<div class="posts  mt-5">
<br>
<h1>Posts</h1>
    
 

<div class="card mb-3">
    <div class="card-body">
        <h5 class="card-title"><?= Html::encode($model->title) ?></h5>
        <p class="card-text"><?= nl2br(Html::encode($model->description)) ?></p>
        <small class="text-muted">Posted on <?= Yii::$app->formatter->asDatetime($model->created_at) ?></small>
        <div class="mt-2">
        
        <?= Html::a('<i class="fa fa-pencil" aria-hidden="true"></i>', ['update-posts', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('<i class="fa fa-trash" aria-hidden="true"></i>', ['delete-posts', 'id' => $model->id], ['class' => 'btn btn-danger', 'data-method' => 'post', 'data-confirm' => 'Are you sure you want to delete this post?']) ?><br><br>
        <a class="btn btn-primary" href="http://localhost/blog/site/view-posts" role="button">Back</a>      
            
        </div>
    </div>
</div>