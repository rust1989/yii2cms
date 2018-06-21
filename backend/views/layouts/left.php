<?php 
 use yii\helpers\Url;
 $con=ucfirst($this->context->id);
 $act=ucfirst($this->context->action->id);
 $kind=Yii::$app->request->get('kind');
 ?>
 <div class="left-side sidebar-offcanvas">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <ul class="sidebar-menu">
                                <li <?php if($con=='Site'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['site/index'])?>">
                                        <i class="fa fa-dashboard"></i> <span>首頁</span>
                                    </a>
                                </li>
                                 <li <?php if($con=='Setting'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['setting/index'])?>">
                                        <i class="fa fa-globe"></i> <span>网站设置</span>
                                    </a>
                                </li>
                                 <li <?php if($con=='User'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['user/index'])?>">
                                        <i class="fa fa-user"></i> <span>管理员</span>
                                    </a>
                                </li>
                                <li <?php if($con=='News'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['news/index'])?>">
                                        <i class="fa fa-list"></i> <span>新闻</span>
                                    </a>
                                </li>
                                 <li <?php if($con=='Categorys'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['categorys/index'])?>">
                                        <i class="fa fa-gavel"></i> <span>产品分类</span>
                                    </a>
                                </li>
                                 <li <?php if($con=='Products'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['products/index'])?>">
                                        <i class="fa fa-list"></i> <span>产品管理</span>
                                    </a>
                                </li>
                                <li <?php if($con=='Downloads'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['downloads/index'])?>">
                                        <i class="fa fa-download"></i> <span>下载管理</span>
                                    </a>
                                </li>
                                <li <?php if($con=='Page'&&$kind=='contactus'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['page/index','kind'=>'contactus'])?>">
                                        <i class="fa fa-download"></i> <span>联系我们</span>
                                    </a>
                                </li>
                                <li <?php if($con=='Page'&&$kind=='aboutus'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['page/index','kind'=>'aboutus'])?>">
                                        <i class="fa fa-download"></i> <span>关于我们</span>
                                    </a>
                                </li>
                                 <li <?php if($con=='Page'&&$kind=='service'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['page/index','kind'=>'service'])?>">
                                        <i class="fa fa-download"></i> <span>售后服务</span>
                                    </a>
                                </li>
                                <li <?php if($con=='Page'&&$kind=='customer'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['page/index','kind'=>'customer'])?>">
                                        <i class="fa fa-download"></i> <span>合作客户</span>
                                    </a>
                                </li>
                                 <li <?php if($con=='Page'&&$kind=='history'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['page/index','kind'=>'history'])?>">
                                        <i class="fa fa-download"></i> <span>发展历程</span>
                                    </a>
                                </li>
                               <li <?php if($con=='Banner'):?>class="active"<?php endif;?>>
                                    <a href="<?=Url::to(['banner/index'])?>">
                                        <i class="fa fa-list"></i> <span>焦点图</span>
                                    </a>
                                </li>
                            </ul>
                        </section>
                        <!-- /.sidebar -->
</div>
                   