<?php
namespace backend\controllers;
use yii\web\Controller;
use yii\helpers\Url;
use yii\web\UploadedFile;
use backend\models\UploadForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
class BaseController extends  Controller{
		/**
		 * {@inheritdoc}
		 */
		public function behaviors()
		{
			return [
			'access' => [
			'class' => AccessControl::className(),
				'rules' => [
				[
				'actions' => ['login', 'error'],
				'allow' => true,
				],
				[
				'actions' => ['logout', 'index','update','create','delete','upload','sort','save'],
				'allow' => true,
				'roles' => ['@'],
				],
			  ],
			],
				'verbs' => [
					'class' => VerbFilter::className(),
					'actions' => [
						'logout' => ['post'],
						'delete' => ['POST'],
					],
				],
			];
		}
	  public function actionUpload(){
	  	     $params=\Yii::$app->request->get();
	  	     $key=$params['key'];
	  	     $model=new UploadForm();
	  	     $data=['msg'=>'上传失败','code'=>0,'file'=>''];
	  	     if(\Yii::$app->request->isPost){
	  	     	$model->image =UploadedFile::getInstance($model,$key);
	  	     	if ($ret=$model->upload()) {
	  	     		// 文件上传成功 
	  	     		$data=['msg'=>'上传成功','code'=>1,'data'=>['path'=>$ret['file']]];
	  	     	}
	  	     }
	  	     return \Yii::createObject([
    			'class'=>'yii\web\Response',
    			'format'=>\yii\web\Response::FORMAT_JSON,
    			'data'=>$data
    			]); 
	  }
	  public function actionSort(){
	  	   $params=\Yii::$app->request->post();
	  	   $table=$params['table'];
	  	   $ids=$params['id'];
	  	   $data=['msg'=>'操作失败','code'=>0,'url'=>''];
	  	   if($ids){
		  	   $ids=explode(",",$ids);
		  	   $query=true;
		  	   
		  	   foreach ($ids as $row){
		  	   	$row=explode("-",$row);
		  	   	$id=$row[0];
		  	   	$sort=$row[1];
		  	   	if($id&&$sort){
		  	   		\Yii::$app->db->createCommand()->update($table, ['sort'=>$sort],['id'=>$id])->execute();
		  	   	}
		  	   }
		  	   $data=['msg'=>'操作成功','code'=>1,'url'=>Url::to(['index'])];
	  	   }
	  	   
	  	   return \Yii::createObject([
	  	   		'class'=>'yii\web\Response',
	  	   		'format'=>\yii\web\Response::FORMAT_JSON,
	  	   		'data'=>$data
	  	   		]);
	  }
}