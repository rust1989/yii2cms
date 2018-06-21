<?php
namespace frontend\controllers;
use backend\models\Banner;
use backend\models\Categorys;
use backend\models\Products;
use yii;
/**
 * Site controller
 */
class ProductController extends BaseController
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
    	$pid=yii::$app->request->get('pid');
    	$categorys=Categorys::find()->asArray()->where(array('pid'=>0,'status'=>1))->orderBy('sort desc')->all();
    	if(empty($pid))$pid=$categorys[0]['id'];
    	$childs=Categorys::find()->asArray()->where(array('pid'=>$pid,'status'=>1))->orderBy('sort desc')->all();
    	
    	if($pid&&count($childs)==0){
    		$childs=Categorys::find()->asArray()->where(array('id'=>$pid,'status'=>1))->orderBy('sort desc')->all();
    	}
    	if(count($childs)){
	    	foreach ($childs as &$child){
	    		$child['products']=Products::find()->asArray()->where(['status'=>1,'cid'=>$child['id']])->orderBy('sort desc')->all();
	    	}
    	}
    	$current=Categorys::findOne(['pid'=>$pid]);
    	if($current){
    	$current=$current->toArray();	
    	$this->setSEO(array('seotitle'=>$current['title']));
    	}
    	$banners=$this->getBanner('product');
        return $this->render('index',['banners'=>$banners,'categorys'=>$categorys,'childs'=>$childs,'pid'=>$pid]);
    }
    public function actionContent(){
    	$id=yii::$app->request->get('id');;
    	$content=Products::findOne(array('status'=>1,'id'=>$id));
    	$next=[];
    	$prev=[];
    	if($content){
    	$content=$content->toArray();
    	$this->setSEO($content);
    	$prev=Products::find(array('status'=>1))->andFilterCompare('sort', '<='.$content['sort'])->andFilterCompare('id','<>'.$content['id'])->asArray()->orderBy('sort desc')->limit(1)->all();
    	if(count($prev))$prev=$prev[0];
    	$next=Products::find(array('status'=>1))->andFilterCompare('sort', '>='.$content['sort'])->andFilterCompare('id','<>'.$content['id'])->asArray()->orderBy('sort asc')->limit(1)->all();
    	if(count($next))$next=$next[0];
    	}
    	$banners=$this->getBanner('productcontent');
    	return $this->render('content',['banners'=>$banners,'content'=>$content,'next'=>$next,'prev'=>$prev]);
    }
}
