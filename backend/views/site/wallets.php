<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<? if($wallets): ?>
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
<? else: ?>
    <div class="alert alert-warning" role="alert">No wallets found.</div>
<? endif; ?>