<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\fileInput;


/* @var $this yii\web\View */
/* @var $model app\models\Kategori */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kategori-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_kategori')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gambar')->widget(FileInput::classname(),
        [
            'data' => $model->sampul,
            'options' => ['multiple' => true],
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
