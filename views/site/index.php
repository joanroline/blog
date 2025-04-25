<?php

/** @var yii\web\View $this */
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-10" style="text-align: center; color: rgb(221, 21, 98);">You are welcome to our blog site</h1>

        <p class="lead">There we go</p>

        <p><a class="btn btn-lg btn-success" href="http://localhost/blog/site/saveuser">SignUp here</a></p>
        <div style= text-align:center><p>Already have an account<br>
             <a class="btn btn-primary" href="http://localhost/blog/site/login" role="button">Login</a> </p>
             <div class="site-welcome">
   
    
    <div class="image-container">
        <?= Html::img( 'https://source.unsplash.com/800x400/?desk', [
            'style' => 'display: block; margin: 0 auto; width: 80%;'
        ]) ?>
    </div>
        </div>
             
    </div>
    </div>

    <!--<div class="body-content">

        <div class="row">
            
            <div class="col-lg-4 mb-3">
                
                <h2>Our first blog</h2>

                <p>Php is a hypertext markup language</p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4 mb-3">
                <h2>Our second blog</h2>

                <p>Php can use many different frameworks like yii, laravel</p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Our third blog</h2>

                <p>Its easy to use frameworks, its helps to simplify the work</p>

                <p><a class="btn btn-outline-secondary" href="https://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>-->
</div>
