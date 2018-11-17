<?php
use app\models\Produk;
use yii\helpers\Html;

?>

<?php $this->title = 'Cari Inspirasi Disini....'; ?>
<?php if (Yii::$app->user->identity->id_user_role == 2): ?>
  <div class="row">

    <?php foreach (Produk::find()->all() as $produk) {?> 
      <!-- Kolom box mulai -->
      <div class="col-md-4">

        <!-- Box mulai -->
        <div class="box box-widget">

          <div class="box-header with-border">
            <div class="user-block">
              <img class="img-circle" src="<?= Yii::getAlias('@web').'/user/user2-160x160.jpg'; ?>" alt="User Image">
              <span class="username"><?= Html::a($produk->nama, ['buku/view', 'id' => $produk->id]); ?></span>
              <span class="description"> Di Terbitkan : Tahun <?= $produk->tahun_terbit; ?></span>
            </div>
            <div class="box-tools">
              <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read"><i class="fa fa-circle-o"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>

          <div class="box-body">
            <img class="img-responsive pad" src="<?= Yii::$app->request->baseUrl.'/upload/sampul/'.$produk['sampul']; ?>" alt="Photo">
            <p>Sinopsis : <?= substr($produk->sinopsis,0,120);?> ...</p>
            <?= Html::a("<i class='fa fa-eye'> Detail Buku</i>",["buku/view","id"=>$produk->id],['class' => 'btn btn-default']) ?>
            <?= Html::a('<i class="fa fa-file"> Pinjam Buku</i>', ['peminjaman/create', 'id_buku' => $produk->id], [
              'class' => 'btn btn-primary',
              'data' => [
                'confirm' => 'Apa anda yakin ingin meminjam buku ini?',
                'method' => 'post',
              ],
            ]) ?>
            <!-- <span class="pull-right text-muted">127 Peminjam - 3 Komentar</span> -->
          </div>

        </div>
        <!-- Box selesai -->

      </div>
      <!-- Kolom box selesai -->  
      <?php
    }
    ?>

  </div>
<?php endif ?>