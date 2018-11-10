<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Produk */

$this->title = 'Tambah Produk';
$this->params['breadcrumbs'][] = ['label' => 'Produk', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-create">
	<div class="box box-primary">
		<div class="box-header with-border">

		</div>
		<div class="box-body">

			<!-- <h1><?= Html::encode($this->title) ?></h1> -->

			<?= $this->render('_form', [
				'model' => $model,
			]) ?>

		</div>
	</div>
</div>
