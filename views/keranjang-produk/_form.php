<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\KeranjangProduk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="keranjang-produk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_keranjang')->textInput() ?>

    <?= $form->field($model, 'id_produk')->textInput() ?>

    <?= $form->field($model, 'id_pesanan')->textInput() ?>

    <?= $form->field($model, 'produk_quantity')->textInput() ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'id_jasa_kirim')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
