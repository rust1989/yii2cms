<?php

namespace backend\controllers;

use Yii;
use backend\models\Page;
use yii\helpers\Url;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends BaseController
{
    /**
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
    	$kind=yii::$app->request->get('kind');
        $list=[];
        $id='';
        $list=Page::findOne(['kind'=>$kind]);
        if($list){
        	$list=$list->toArray();
        	$id=$list['id'];
        }
        
        return $this->render('index', ['item' => $list,'kind'=>$kind,'id'=>$id,]);
    }
    public function  actionSave(){

    	$params=\Yii::$app->request->post();
    	$gets=\Yii::$app->request->get();
        $id=isset($gets['id'])?$gets['id']:'';
        $kind=isset($gets['kind'])?$gets['kind']:'';
        if($id){
    	$model=Page::findOne(['id'=>$id]);
        }else{
        $model=new Page();	
        }
        
    	unset($params['_csrf-backend']);
    	$data=['msg'=>'操作失败'];
    	if($model->load(Yii::$app->request->post())&&$model->save()){
    		$data=['msg'=>'操作成功','code'=>1,'url'=>Url::to(['index','kind'=>$kind])];
    	}
    	
    	return Yii::createObject([
    			'class'=>'yii\web\Response',
    			'format'=>\yii\web\Response::FORMAT_JSON,
    			'data'=>$data
    			]);
    }
}
