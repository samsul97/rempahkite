<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\KeranjangProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Keranjang Produks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="keranjang-produk-index">
<div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a('Tambah Keranjang Produk', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No',
                'contentOptions' => ['style' => 'text-align:center;'],
                'headerOptions' => ['style' => 'text-align:center;']
            ],

            // 'id',
            'id_keranjang',
            'id_produk',
            'id_pesanan',
            'produk_quantity',
            //'harga',
            //'id_jasa_kirim',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center;']
            ],
        ],
    ]); ?>
</div>
