<?php

use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BranchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Branch', ['value' => Url::to('index.php?r=branch/create'), 'class' => 'btn btn-success', 'id' => 'modalButton']) ?>
    </p>
    <?php
    Modal::begin([
        'header' => '<h4>Shipment</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function ($model) {
            if ($model->branch_status == 'inactive') {
                return ['class' => 'danger'];
            } else {
                return ['class' => 'success'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'company_id',
                'value' => 'companies.company_name',
            ],
            'branch_name',
            'branch_address',
            'branch_create_date',
            'branch_status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>
    <?php Pjax::end(); ?>
</div>
