<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<?= Html::a($addr, 'https://etherscan.io/address/' . $addr, ['target' => '_blank']); ?>