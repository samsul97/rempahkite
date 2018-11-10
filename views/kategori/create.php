<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Kategori */

$this->title = 'Tambah Kategori';
$this->params['breadcrumbs'][] = ['label' => 'Kategoris', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-create">
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
