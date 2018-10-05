<?php
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <!-- <div class="container-fluid"> -->
      <div class="navbar-header">
        <?= Html::a('<span class="logo-mini">RK</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>
        <!-- <a href="../../index2.html" class="navbar-brand"><b>Admin</b>LTE</a> -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
      </button>
  </div>

  <nav class="navbar navbar-static-top" role="navigation">

<!--         <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a> -->

        <!-- <div class="navbar-custom-menu"> -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> -->
                    <li style="margin-left: 70px;"><a href="#"><i class="fa fa-exchange fa-lg"></i></a></li>
                    
                    <form class="navbar-form navbar-left" role="search" style="margin-left: 50px;">
                      <div class="form-group">
                        <input type="text" class="form-control" style="width: 400px;" id="navbar-search-input" placeholder="Search">
                        <span class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </ul>

                <!-- Messages: style can be found in dropdown.less-->
                <ul class="nav navbar-nav" style="float: right;">
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-shopping-cart fa-lg"></i>
                      <span class="label label-success">4</span>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="header">You have 4 messages</li>
                      <li>
                        <!-- inner menu: contains the actual data -->
                        <ul class="menu">
                          <li><!-- start message -->
                            <a href="#">
                              <div class="pull-left">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                            </div>
                            <h4>
                                Sender Name
                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                            </h4>
                            <p>Message Excerpt</p>
                        </a>
                    </li><!-- end message -->
                    ...
                </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
        </ul>
    </li>
    <!-- Notifications: style can be found in dropdown.less -->
    
<!-- Tasks: style can be found in dropdown.less -->

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i>Mau cari apa?</i><span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
      <li><a href="#">Beras</a></li>
      <li><a href="#">Bumbu Dapur</a></li>
      <li><a href="#">Ikan</a></li>
      <li class="divider"></li>
      <li><a href="#">Other</a></li>
      <!-- <li class="divider"></li>
      <li><a href="#">One more separated link</a></li> -->
  </ul>
</li>
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
        <span class="hidden-xs">Alexander Pierce</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
            alt="User Image"/>

            <p>
                Alexander Pierce
                <small>Member since Nov. 2012</small>
            </p>
        </li>
        <!-- Menu Body -->
                        <!-- <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-list fa-lg"></i></a>
                </li>
            </ul>
            </ul>
        </div>
    </nav>
</header>
