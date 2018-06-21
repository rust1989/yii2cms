 <?php 
 use yii\helpers\Url;
 use yii\helpers\Html;
 ?>
 <div  class="header">
            <a href="<?=Url::to(['index/index'])?>" class="logo"><?=Yii::$app->params['webname']?>后台</a>
            <div class="navbar navbar-static-top" role="navigation">
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?=Yii::$app->user->identity->username?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">帳號</li>
                                        <li>
                                            <?=Html::beginForm(['/site/logout'], 'post')?>
                                            <a href="javascript:void(0)" onclick="$(this).parent('form').submit()"><i class="fa fa-ban fa-fw pull-right"></i>登出</a>
								            <?=Html::endForm()?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
           </div>
</div>
               