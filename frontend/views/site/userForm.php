<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;


if (Yii::$app->session->hasFlash('success')) {
    echo(Yii::$app->session->getFlash('success'));
}


$form = ActiveForm::begin();

echo $form->field($model, 'name');
echo $form->field($model, 'email');

echo Html::submitButton('Submit', ['class' => 'btn btn-primary']);

ActiveForm::end();
?>﻿

<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This is the About page. You may modify the following file to customize its content:</p>

    <code><?= __FILE__ ?></code>
</div>
