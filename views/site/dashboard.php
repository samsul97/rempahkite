<?php

use yii\helpers\Html;
use yii\helpers\Url;
use app\models\User;
use app\models\Customer;
use app\models\Produk;
use app\models\Kategori;
use app\models\Pesanan;
use miloschuman\highcharts\Highcharts;
use app\models\Pembayaran;
use app\models\KeranjangProduk;

/* @var $this yii\web\View */

$this->title = 'Statistik Perpustakaan';
?>

<?php if (Yii::$app->user->identity->id_user_role == 1): ?>
  <div class="site-index">
    <small>Welcome to dashboard perpustakaan. Silahkan kelola perpustakaan dengan baik.</small>
    <br>
    <br>
    <div class="row" style="margin: 3px;">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Customer::getCount()); ?></h3>
            <p>Data Customer</p>
          </div
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Produk::getCount()); ?><sup style="font-size: 20px">%</sup></h3>
            <p>Data Produk</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Transaksi::getCount()); ?></h3>
            <p>Data Transaksi</p>
          </div>
          <div class="icon">
            <i class="fa fa-exchange"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Kategori::getCount()); ?></h3>
            <p>Data Kategori</p>
          </div>
          <div class="icon">
            <i class="fa fa-bookmark"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
    </div>


    <div class="row">
      <div class="col-sm-6">
        <div class="box-header with-border">
          <h3 class="box-title">Buku Berdasarkan Kategori</h3>
        </div>
        <div class="box-body">
          <?=Highcharts::widget([
            'options' => [
              'credits' => false,
              'title' => ['text' => 'KATEGORI BUKU'],
              'exporting' => ['enabled' => true],
              'plotOptions' => [
                'pie' => [
                  'cursor' => 'pointer',
                ],
              ],
              'series' => [
                [
                  'type' => 'pie',
                  'name' => 'Kategori',
                  'data' => Kategori::getGrafikList(),
                ],
              ],
            ],
          ]);?>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="box-header with-border">
          <h3 class="box-title">Buku Berdasarkan Penulis</h3>
        </div>
        <div class="box-body">
          <?=Highcharts::widget([
            'options' => [
              'credits' => false,
              'title' => ['text' => 'PENULIS BUKU'],
              'exporting' => ['enabled' => true],
              'plotOptions' => [
                'pie' => [
                  'cursor' => 'pointer',
                ],
              ],
              'series' => [
                [
                  'type' => 'pie',
                  'name' => 'Penulis',
                  'data' => Produk::getGrafikList(),
                ],
              ],
            ],
          ]);?>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>

<!-- Dashboard Petugas -->
<?php if (Yii::$app->user->identity->id_user_role == 3): ?>
  <?php $this->title = 'Perpustakaan'; ?>

  <div class="site-index">
    <small>Welcome to dashboard perpustakaan. Silahkan kelola perpustakaan dengan baik.</small>
    <br>
    <br>
    <div class="row" style="margin: 3px;">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Customer::getCount()); ?></h3>
            <p>Data Customer</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Kategori::getCount()); ?><sup style="font-size: 20px">%</sup></h3>
            <p>Data Kategori</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Produk::getCount()); ?></h3>
            <p>Data Produk</p>
          </div>
          <div class="icon">
            <i class="fa fa-exchange"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Pesanan::getCount()); ?></h3>
            <p>Data Pesanan</p>
          </div>
          <div class="icon">
            <i class="fa fa-bookmark"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
    </div>

    <div class="row" style="margin: 3px;">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Produk::getCount()); ?></h3>
            <p>Data Produk</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Kategori::getCount()); ?><sup style="font-size: 20px"></sup></h3>
            <p>Data Kategori</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-orange">
          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Produk::getCount()); ?></h3>
            <p>Data Produk</p>
          </div>
          <div class="icon">
            <i class="fa fa-exchange"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?= Yii::$app->formatter->asInteger(Produk::getCount()); ?></h3>
            <p>Data Produk</p>
          </div>
          <div class="icon">
            <i class="fa fa-bookmark"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div><!-- ./col -->
    </div>


    <div class="row">
      <div class="col-sm-6">
        <div class="box-header with-border">
          <h3 class="box-title">Produk Berdasarkan Kategori</h3>
        </div>
        <div class="box-body">
          <?=Highcharts::widget([
          'options' => [
            'credits' => false,
            'title' => ['text' => 'PENERBIT BUKU'],
            'exporting' => ['enabled' => true],
            'plotOptions' => [
              'pie' => [
                'cursor' => 'pointer',
              ],
            ],
            'series' => [
              [
                'type' => 'pie',
                'name' => 'Penerbit',
                'data' => Kategori::getGrafikList(),
              ],
            ],
          ],
        ]);?>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="box-header with-border">
          <h3 class="box-title">Pesanan Berdasarkan Customer</h3>
        </div>
        <div class="box-body">
          <?=Highcharts::widget([
          'options' => [
            'credits' => false,
            'title' => ['text' => 'PENERBIT BUKU'],
            'exporting' => ['enabled' => true],
            'plotOptions' => [
              'pie' => [
                'cursor' => 'pointer',
              ],
            ],
            'series' => [
              [
                'type' => 'pie',
                'name' => 'Penerbit',
                'data' => Pesanan::getGrafikList(),
              ],
            ],
          ],
        ]);?>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-6">
      <div class="box-header with-border">
        <h3 class="box-title">Pembayaran Berdasarkan Pesanan</h3>
      </div>
      <div class="box-body">
        <?=Highcharts::widget([
          'options' => [
            'credits' => false,
            'title' => ['text' => 'PENERBIT BUKU'],
            'exporting' => ['enabled' => true],
            'plotOptions' => [
              'pie' => [
                'cursor' => 'pointer',
              ],
            ],
            'series' => [
              [
                'type' => 'pie',
                'name' => 'Penerbit',
                'data' => Pembayaran::getGrafikList(),
              ],
            ],
          ],
        ]);?>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="box-header with-border">
        <h3 class="box-title">Keranjang Produk Berdasarkan Keranjang Sementara</h3>
      </div>
      <div class="box-body">
        <?=Highcharts::widget([
          'options' => [
            'credits' => false,
            'title' => ['text' => 'PENERBIT BUKU'],
            'exporting' => ['enabled' => true],
            'plotOptions' => [
              'pie' => [
                'cursor' => 'pointer',
              ],
            ],
            'series' => [
              [
                'type' => 'pie',
                'name' => 'Penerbit',
                'data' => KeranjangProduk::getGrafikList(),
              ],
            ],
          ],
        ]);?>
      </div>
    </div>
  </div>
<?php endif ?>