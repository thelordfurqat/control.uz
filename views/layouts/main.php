<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\helpers\Html;
use app\assets\AppAsset;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <script src="<?=Yii::$app->homeUrl?>theme/js/jquery.min.js"></script>

    <?php $this->head() ?>
</head>
<body class="nav-md">
<?php $this->beginBody() ?>
<div class="container body">


    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?=Yii::$app->homeUrl?>" class="site_title"><i class="fa fa-laptop"></i> <span>Monitoring</span></a>
                </div>
                <div class="clearfix"></div>
                <br>
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>Asosiy qism</h3>
                        <ul class="nav side-menu">
                            <li><a href="<?=Yii::$app->homeUrl?>"><i class="fa fa-home"></i>Bosh menyu</a>
                            </li>
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/viewmodel'])?>"><i class="fa fa-laptop"></i> Modellar</a>
                            </li>
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['site/viewjihoz'])?>"><i class="fa fa-cogs"></i> Barcha jihozlar</a>
                            </li>
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['stuff'])?>"><i class="fa fa-users"></i>Xodimlar</a>
                            </li>
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['room'])?>"><i class="fa fa-columns"></i>Xonalar</a>
                            </li>
                        </ul>
                    </div>
                    <div class="menu_section">
                        <h3>Sozlamalar</h3>
                        <ul class="nav side-menu">
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['qurilma'])?>"><i class="fa fa-desktop"></i>Qurilmalar</a>
                            </li>
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['qismqurilma'])?>"><i class="fa fa-cogs"></i>Qismlar</a>
                            </li>
                            <li><a href="<?=Yii::$app->urlManager->createUrl(['user'])?>"><i class="fa fa-user"></i>Foydalanuvchilar</a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">

                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <div class="top_search col-lg-2" style="margin-top: 10px;">
                        <?php \yii\widgets\ActiveForm::begin(['method'=>'get','action'=>Yii::$app->urlManager->createUrl(['site/findall'])])?>
                        <div class="input-group">
                            <input type="text" class="form-control" name="data" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">Go!</button>
                             </span>
                        </div>
                        <?php \yii\widgets\ActiveForm::end()?>
                    </div>

                    <ul class="nav navbar-nav navbar-right" style="height: 55px" >
                        <li class="nav " style="height: 100%">
                            <form action="<?=Yii::$app->urlManager->createUrl(['/site/logout'])?>" method="post" style="padding: 15px">
                                <?=Html::beginForm()?>

                                <li class="">

                                <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?=Yii::$app->homeUrl?>image/<?=Yii::$app->user->identity->image?>" alt=""><?=Yii::$app->user->identity->username?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                <li><a href="<?=Yii::$app->urlManager->createUrl(['user/view','id'=>Yii::$app->user->identity->id])?>">  Profil</a>
                                </li>
                                    <li>
                                      <a href="<?=Yii::$app->urlManager->createUrl(['user'])?>">
                                            <span class="badge bg-red pull-right"><?=sizeof(\app\models\User::find()->all())?>ta</span>
                                           <span>Barcha Adminlar</span>
                                      </a>
                                    </li>
                                    <li><button class="logoutsite">
                                            <i class="fa fa-sign-out pull-right"></i>Chiqish</button>
                                    </li>
                                </ul>
                            <?=Html::endForm()?>

                            </form>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">
            <div class="container">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>

                <footer class="footer">
                    <p class="pull-right">Bu dastur <a href="http://www.ubtuit.uz/">TATU Urganch filiali</a> talabasi tomonidan yatatilgan. |
                        <span class="lead"> <i class="fa fa-angellist"></i> Saparbayeva Asal</span>
                    </p>
                </footer>
        </div>


        </div>

</div>
<script src="<?=Yii::$app->homeUrl?>theme/js/bootstrap.min.js"></script>

<!-- chart js -->
<script src="<?=Yii::$app->homeUrl?>theme/js/chartjs/chart.min.js"></script>
<!-- bootstrap progress js -->
<script src="<?=Yii::$app->homeUrl?>theme/js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="<?=Yii::$app->homeUrl?>theme/js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="<?=Yii::$app->homeUrl?>theme/js/icheck/icheck.min.js"></script>
<!-- tags -->
<script src="<?=Yii::$app->homeUrl?>theme/js/tags/jquery.tagsinput.min.js"></script>
<!-- switchery -->
<script src="<?=Yii::$app->homeUrl?>theme/js/switchery/switchery.min.js"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="<?=Yii::$app->homeUrl?>theme/js/moment.min2.js"></script>
<script type="text/javascript" src="<?=Yii::$app->homeUrl?>theme/js/datepicker/daterangepicker.js"></script>
<!-- richtext editor -->
<script src="<?=Yii::$app->homeUrl?>theme/js/editor/bootstrap-wysiwyg.js"></script>
<script src="<?=Yii::$app->homeUrl?>theme/js/editor/external/jquery.hotkeys.js"></script>
<script src="<?=Yii::$app->homeUrl?>theme/js/editor/external/google-code-prettify/prettify.js"></script>
<!-- select2 -->
<script src="<?=Yii::$app->homeUrl?>theme/js/select/select2.full.js"></script>
<!-- form validation -->
<script type="text/javascript" src="<?=Yii::$app->homeUrl?>theme/js/parsley/parsley.min.js"></script>
<!-- textarea resize -->
<script src="<?=Yii::$app->homeUrl?>theme/js/textarea/autosize.min.js"></script>
<script>
    autosize($('.resizable_textarea'));
</script>
<!-- Autocomplete -->
<script type="text/javascript" src="<?=Yii::$app->homeUrl?>theme/js/autocomplete/countries.js"></script>
<script src="<?=Yii::$app->homeUrl?>theme/js/autocomplete/jquery.autocomplete.js"></script>

<script src="<?=Yii::$app->homeUrl?>theme/js/custom.js"></script>

<!-- /form validation -->


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
