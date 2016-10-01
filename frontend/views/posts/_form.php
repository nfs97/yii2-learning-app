<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \frontend\models\Posts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posts-form">

    <?php
    $form = ActiveForm::begin();

    echo $form->field($model, 'post_title')->textInput(['maxlength' => true]);

    echo $form->field($model, 'post_description')->textarea(['rows' => 6]);

    echo $form->field($model, 'author_id')->textInput();
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
