<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProdukSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama_produk') ?>

    <?= $form->field($model, 'stok') ?>

    <?= $form->field($model, 'quantity_minimum') ?>

    <?= $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'deskripsi_barang') ?>

    <?php // echo $form->field($model, 'sku') ?>

    <?php // echo $form->field($model, 'preview_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
