<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JasaKirimSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jasa Kirims';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jasa-kirim-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jasa Kirim', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nama_jasa',
            'harga',
            'estimasi_waktu',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
