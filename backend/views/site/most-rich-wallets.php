<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Top Richest Wallets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                    'format' => 'raw',
                    'label' => 'Amount',
                    'value' => function($data) {
                        return Html::a($data->addr, 'https://etherscan.io/address/' . $data->addr, ['target' => '_blank']);
                    }
            ],
            'amount',
            'utm_source',
            'amount_of_sessions',
            'last_visit',


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
