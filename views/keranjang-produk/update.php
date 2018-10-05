<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\KeranjangProduk */

$this->title = 'Update Keranjang Produk: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Keranjang Produks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="keranjang-produk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
