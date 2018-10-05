<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JasaKirim */

$this->title = 'Create Jasa Kirim';
$this->params['breadcrumbs'][] = ['label' => 'Jasa Kirims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jasa-kirim-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
