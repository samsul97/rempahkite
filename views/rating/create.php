<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Rating */

$this->title = 'Tambah Rating';
$this->params['breadcrumbs'][] = ['label' => 'Ratings', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="rating-create">
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
