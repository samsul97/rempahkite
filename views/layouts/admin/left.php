<?php
use app\models\User;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel" style="margin-top: 10px;">
            <div class="pull-left image">
                <?php if (User::isAdmin()): ?>
                           <?= User::getFotoAdmin(['class' => 'img-circle']); ?>
                       <?php endif ?>
                       <?php if (User::isOperator()): ?>
                           <?= User::getFotoOperator(['class' => 'img-circle']); ?>
                       <?php endif ?>
                       
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Admin', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['site/dashboard']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Customer', 'icon' => 'users', 'url' => ['customer/index']],
                    [
                        'label' => 'Data Produk',
                        'icon' => 'briefcase',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Kategori', 'icon' => 'list', 'url' => ['kategori/index']],
                            ['label' => 'Produk', 'icon' => 'briefcase', 'url' => ['produk/index']],
                            ['label' => 'Images', 'icon' => 'image', 'url' => ['images/index']],
                        ],
                    ],

                    [
                        'label' => 'Transaksi',
                        'icon' => 'exchange',
                        'url' => '#',
                        'items' => [
                            // ['label' => 'Keranjang', 'icon' => 'shopping-cart', 'url' => ['keranjang/index']],
                            ['label' => 'Keranjang Produk', 'icon' => 'shopping-cart', 'url' => ['keranjang-produk/index']],
                            ['label' => 'Pesanan', 'icon' => 'first-order', 'url' => ['pesanan/index']],
                            ['label' => 'Pembayaran', 'icon' => 'exchange', 'url' => ['pembayaran/index']],
                        ],
                    ],
                    ['label' => 'Rating', 'icon' => 'star', 'url' => ['rating/index']],
                    ['label' => 'Laporan', 'icon' => 'file', 'url' => ['rating/index']],
                    ['label' => 'Utility', 'options' => ['class' => 'header']],
                    ['label' => 'Data Master', 'icon' => 'database', 'url' => ['rating/index']],
                    ['label' => 'Profil', 'icon' => 'user-circle-o', 'url' => ['rating/index']],
                    [
                        'label' => 'User',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Petugas', 'url' => ['petugas/index'], 'visible' => Yii::$app->user->isGuest],
                            ['label' => 'Anggota', 'url' => ['anggota/index'], 'visible' => Yii::$app->user->isGuest],
                        ],
                    ],
                ],  
            ]
        ) ?>

    </section>

</aside>
