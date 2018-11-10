<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Images */

$this->title = 'Tambah Images';
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-create">
	<div class="box box-primary">
		<div class="box-header with-border">
		<div class="box-body">
			
		</div>			
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

		</div>
	</div>
</div>
