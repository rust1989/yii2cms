<?php
namespace frontend\controllers;
use backend\models\Downloads;
use yii\data\Pagination;
use backend\models\Page;
use yii;
/**
 * Common controller
 */
class CommonController extends BaseController
{
    
    public function actionSupport(){
    	$this->setSEO(array('seotitle'=>Yii::t('app', 'support')));
    	$query=Downloads::find()->where(['status'=>1]);
    	$count=$query->count();
    	$pagination=new Pagination(['totalCount'=>$count]);
    	$downloads=$query->asArray()->offset($pagination->offset)->limit($pagination->limit)->orderBy('sort desc')->all();
    	$banners=$this->getBanner('support');
    	return $this->render('support',['banners'=>$banners,'downloads'=>$downloads,'pagination'=>$pagination]);
    }
    protected function searchPage($kind){
    	$this->setSEO(array('seotitle'=>Yii::t('app',$kind)));
    	$page=Page::findOne(['kind'=>$kind]);
    	if($page){
    		return $page->toArray();
    	}else{
    		return [];
    	}
    }
    public function actionAboutus(){
    	$page=$this->searchPage('aboutus');
    	$banners=$this->getBanner('aboutus');
    	return $this->render('aboutus',['banners'=>$banners,'page'=>$page]);
    }
    public function actionContactus(){
    	$page=$this->searchPage('contactus');
    	$banners=$this->getBanner('contactus');
    	return $this->render('contactus',['banners'=>$banners,'page'=>$page]);
    }
    public function actionHistory(){
    	$page=$this->searchPage('history');
    	$banners=$this->getBanner('history');
    	return $this->render('history',['banners'=>$banners,'page'=>$page]);
    }
    public function actionService(){
    	$page=$this->searchPage('service');
    	$banners=$this->getBanner('service');
    	return $this->render('service',['banners'=>$banners,'page'=>$page]);
    }
    public function actionCustomer(){
    	$page=$this->searchPage('customer');
    	$banners=$this->getBanner('customer');
    	return $this->render('customer',['banners'=>$banners,'page'=>$page]);
    }
}
