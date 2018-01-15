<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<table class="table table-striped table-bordered">
    <tr>
        <th>Wallet</th>
        <th>Amount</th>
    </tr>
<? foreach($wallets as $wallet): ?>
    <tr>
        <td><?= $this->render('wallet-addr', ['addr' => $wallet->addr]); ?></td>
        <td><?= $wallet->amount; ?></td>
    </tr>
<? endforeach; ?>
</table>