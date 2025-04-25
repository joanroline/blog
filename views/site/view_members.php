<?php
/** @var yii\web\View $this */

use yii\helpers\Html;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <br>
    <div class="table-responsive posts mt-5">
    <table class="table table-bordered">
    <thead class= "table-dark">
        <tr>
            <th>NO</th>
            <th>Fname</th>
            <th>Lname</th>
           
            <th>Email</th>
            <th>Action</th>
           
        </tr>
    </thead>
    <tbody>
    
     <?php foreach ($model as $key => $person): ?>
            <tr>
                <td><?= ($key + 1) ?></td>
                <td><?= Html::encode($person->firstname) ?></td>
                <td><?= Html::encode($person->lastname) ?></td>
              
                <td><?= Html::encode($person->email) ?></td>
                
                <td> 
                <?= Html::a('<i class="fa fa-eye" aria-hidden="true"></i>', ['view-member', 'id' => $person->id], ['class' => 'btn btn-primary']) ?>  
                <?= Html::a('<i class="fa fa-pencil" aria-hidden="true"></i>', ['update-members', 'id' => $person->id], ['class' => 'btn btn-primary']) ?>   
                <?= Html::a('<i class="fa fa-trash" aria-hidden="true"></i>', ['delete-members', 'id' => $person->id], ['class' => 'btn btn-danger','data-confirm'=>'Are you sure you want to delete this member?','data-method'=>'post'])?>
     
            </td>   
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>
</body>
</html>


