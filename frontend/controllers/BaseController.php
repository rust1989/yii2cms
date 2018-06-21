<?php
namespace frontend\controllers;
use yii\web\Controller;
use backend\models\Categorys;
use yii;
use backend\models\Banner;
class BaseController extends Controller{
	  public function __construct($id, $module){
	  	   parent::__construct($id, $module);
	  	   $categorys=Categorys::find()->asArray()->where(array('pid'=>0,'status'=>1))->orderBy('sort desc')->all();
	  	   $view=Yii::$app->view;
	  	   $view->params['categorys']=$categorys;
	  	   
	  	   $view->params['seotitle']=Yii::$app->params['seotitle'];
	  	   $view->params['metadescription']=Yii::$app->params['metadescription'];
	  	   $view->params['metakeywords']=Yii::$app->params['metakeywords'];
	  }
	  protected function setSEO($params){
	  	$view=Yii::$app->view;
	  	$view->params['seotitle']=isset($params['seotitle'])?$params['seotitle'].'-'.Yii::$app->params['seotitle']:Yii::$app->params['seotitle'];
	  	$view->params['metadescription']=isset($params['metadescription'])&&$params['metadescription']?$params['metadescription']:Yii::$app->params['metadescription'];
	  	$view->params['metakeywords']=isset($params['metakeywords'])&&$params['metakeywords']?$params['metakeywords']:Yii::$app->params['metakeywords'];
	  }
	  //焦点图
	  protected function getBanner($kind){
	  	$banners=Banner::find()->asArray()->where(['position'=>$kind])->orderBy('sort desc')->all();
	  	return $banners;
	  }
	  //语言切换
	  public function actionLanguage(){
	  	$language=  \Yii::$app->request->get('lang');
	  	if(isset($language)){
	  		\Yii::$app->session['language']=$language;
	  	}
	  	//切换完语言哪来的返回到哪里
	  	$this->goBack(\Yii::$app->request->headers['Referer']);
	  }
	
}

?>