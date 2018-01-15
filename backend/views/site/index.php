<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'ga',
            'ip',
            'datetime',
            'utm_source',
            'utm_medium',
            'utm_campaign',
            [
                'format' => 'raw',
                'value' => function ($model) {
                    return $this->render('wallets', ['wallets' => $model->wallets]);
                },
            ],


        ]
    ]);



//            [
//                'attribute' => 'Wallets',
//                'format' => 'raw',
//                'value' => function($model) {
//                    return $model->wallets;
//                }
//            ],

//            ['class' => 'yii\grid\ActionColumn'],
//        ],

    ?>
</div>
