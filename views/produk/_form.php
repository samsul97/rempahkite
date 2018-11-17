<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\number\NumberControl;
use kartik\select2\Select2;
use app\models\Kategori;
use yii\helpers\ArrayHelper;
use kartik\file\fileInput;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Produk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produk-form">

    <?php
$dispOptions = ['class' => 'form-control kv-monospace', 'tabindex' => 1000];
$saveOptions = [
    'type' => 'text', 
    'label'=>'<label>Saved Value: </label>', 
    'class' => 'kv-saved',
    'readonly' => true,
    'tabindex' => 1000,
    'tag' => 'div',
    'class' => ''
];
 
$saveCont = ['class' => 'kv-saved-cont'];
?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_produk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_kategori')->widget(Select2::classname(),
        [
            'data' => Kategori::getList(),
            'options' => [
                'placeholder' => '-Pilih Kategori-',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

    <div class="col-md-12 col-xs-12 col-sm-12">
    <div class="col-md-3 col-xs-12 col-sm-12">

    <?= $form->field($model, 'stok', ['options' => [ 'style' => 'width:200px'],
        'template' => '<div class="input-group"><span class="input-group-addon">Stok</span>{input}'.
            '<span class="input-group-addon">Pcs</span></div>',
    ])->widget(NumberControl::classname(), [
        'data' => 'integer',
        'maskedInputOptions' => [
            'digits' => 0,
            'alias' => 'numeric',
            'groupSeparator' => ',',
            'autoGroup' => true,
            'autoUnmask' => true,
            'unmaskAsNumber' => true,
        ],
    ]); ?>
</div>

<div class="col-md-3 col-xs-12 col-sm-12">
    <?= $form->field($model, 'quantity_minimum', [
        'template' => '<div class="input-group"><span class="input-group-addon">Quantity</span>{input}'.
            '<span class="input-group-addon">Buah</span></div>',
    ])->widget(NumberControl::classname(), [
        'data' => 'integer',
        'maskedInputOptions' => [
            'digits' => 0,
            'alias' => 'numeric',
            'groupSeparator' => ',',
            'autoGroup' => true,
            'autoUnmask' => true,
            'unmaskAsNumber' => true,
        ],
    ]); ?>

</div>

<div class="col-md-3 col-xs-12 col-sm-12">
    <?= $form->field($model, 'harga', ['options' => [ 'style' => 'width:200px'], 'template' => '<div class="input-group"><span class="input-group-addon">Rp.</span>{input}'.'</div>',
    ])->widget(NumberControl::classname(), [
        'data' => 'number-decimal',
        'maskedInputOptions' => [
            'digits' => 0,
            'alias' => 'numeric',
            'groupSeparator' => ',',
            'autoGroup' => true,
            'autoUnmask' => true,
            'unmaskAsNumber' => true,
        ],
    ]); ?>

</div>

<div class="col-md-3 col-xs-12 col-sm-12">

    <?= $form->field($model, 'sku', [
        'template' => '<div class="input-group"><span class="input-group-addon">Sku</span>{input}'.'</div>',
    ])->widget(NumberControl::classname(), [
        'data' => 'integer',
        'maskedInputOptions' => [
            'digits' => 0,
            'alias' => 'numeric',
            'groupSeparator' => ',',
            'autoGroup' => true,
            'autoUnmask' => true,
            'unmaskAsNumber' => true,
        ],
    ]); ?>
</div>
    </div>

    <?= $form->field($model, 'deskripsi_barang')->widget(TinyMce::classname(), [
        'options' => ['rows' => 8],
        'language' => 'en',
        'clientOptions' => [
         'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"   
        ]
    ]); ?>

    <?= $form->field($model, 'preview_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
