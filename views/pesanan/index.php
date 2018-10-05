<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PesananSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pesanan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pesanan-index">
<div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a('Tambah Pesanan', ['create'], ['class' => 'btn btn-success']) ?>
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
            'id_customer',
            'token',
            'tgl_transaksi',
            'jumlah_total',
            //'status',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => ['style' => 'text-align:center;']
            ],
        ],
    ]); ?>
</div>
</div>
</div>