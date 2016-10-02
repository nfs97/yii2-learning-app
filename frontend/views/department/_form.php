<?php

use frontend\models\Branch;
use frontend\models\Companies;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_id')->dropDownList(
        ArrayHelper::map(Companies::find()->all(), 'company_id', 'company_name'),
        [
            'prompt' => 'Select company',
            'onchange' => '
            $.post("index.php?r=branch/lists&id='.'"+$(this).val(), function(data){
                $("select#department-branch_id").html(data);
            });'
        ]
    ) ?>

    <?= $form->field($model, 'branch_id')->dropDownList(
        ArrayHelper::map(Branch::find()->all(), 'branch_id', 'branch_name'),
        ['prompt' => 'Select company']
    ) ?>

    <?= $form->field($model, 'department_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department_status')->dropDownList(['active' => 'Active', 'inactive' => 'Inactive',], ['prompt' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
