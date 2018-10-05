<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RatingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rating-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_produk') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'bintang') ?>

    <?= $form->field($model, 'komentar') ?>

    <?php // echo $form->field($model, 'id_deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
