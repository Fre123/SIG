<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body  >
   <?php $this->beginBody() ?>
        
   <?php if (Yii::$app->user->isGuest) {  ?>   
       
        <div class="container body">

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <strong><span class=" fa fa-map-marker text-success fa-2x"></span></strong>
                                    <!--span class=" fa fa-angle-down"></span-->
                                </a>
   
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
        </div>
        <!-- page content -->

    <div class="row">
        <div class="x_panel">
            <!-- Mapa -->
            
            <div class="col-md-6"> 
                    <div class="x_content">
                        <div class="center-block">
                            <div id="world-map-gdp" class="col-md-12" style="height:700px;"></div>
                        </div>
                    </div>
                
            </div>
              
            <!-- Mapa -->
            <!-- Login -->
            <div class="col-md-6"> 
                <br>
                        <?=
                        Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ])
                        ?>
                        <?= Alert::widget() ?>
                        <?= $content ?>
                   
            </div>
            <!-- Login -->
  
        </div>
        

    </div>

   <?php }else {   ?>
        
        
   <?= $this->render('inicio.php', ['baseUrl' => $baseUrl, 'content' => $content]) ?>
          
   <?php } ?>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
