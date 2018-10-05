<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-index">
<div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Images', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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

            'id',
            'url:url',
            'type',
            'id_produk',
            'kunci',

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['style' => 'text-align:center;']
            ],
        ],
    ]); ?>
</div>
</div>
</div>