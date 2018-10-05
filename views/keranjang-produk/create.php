<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\KeranjangProduk */

$this->title = 'Create Keranjang Produk';
$this->params['breadcrumbs'][] = ['label' => 'Keranjang Produks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keranjang-produk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
