<?php

namespace backend\controllers;

use Yii;
use backend\models\Categorys;
use backend\models\CategorysSearch; 
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use backend\models\Products;

/**
 * CategorysController implements the CRUD actions for Categorys model.
 */
class CategorysController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
    	$behav=parent::behaviors();
    	$behav['verbs']['actions']['delete']=['GET'];
        return $behav;
    }

    /**
     * Lists all Categorys models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategorysSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model=new Categorys();
        $list=$model->treelist();
        return $this->render('index', [
        	'list'=>$list,	
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

 

    /**
     * Creates a new Categorys model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categorys();
        if(Yii::$app->request->isPost)$model->create_date=date("Y-m-d H:i:s");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
        	$lastid=$model->getDb()->getLastInsertID();
        	$model->sort=$lastid;
        	$model->save();
            return $this->redirect(['index']);
        }
        $list=Categorys::find()->where(['status'=>1,'pid'=>0])->asArray()->all();
        $keys=array_column($list,'id');
        $values=array_column($list,'title');
        $categorys=array_combine($keys, $values);
        return $this->render('create', [
            'model' => $model,
        	'categorys'=>$categorys	
        ]);
    }

    /**
     * Updates an existing Categorys model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        $list=Categorys::find()->where(['status'=>1,'pid'=>0])->asArray()->all();
        $keys=array_column($list,'id');
        $values=array_column($list,'title');
        $categorys=array_combine($keys, $values);
        return $this->render('update', [
            'model' => $model,
        	'categorys'=>$categorys
        ]);
    }

    /**
     * Deletes an existing Categorys model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $pid=$model->pid;
        $id=$model->id;
        $check=false;
        $child=false;
        if($pid==0){
        	$count=Categorys::find()->where(['pid'=>$id])->count();
        	
        	if($count)$child=true;
        }
        $count=Products::find()->andWhere(['cid'=>$id])->count('id');
        if($count)$check=true;
        
        
        if($child){
        	$data=['msg'=>'先删除子节点','code'=>0];
        }else if($check){
        	$data=['msg'=>'先删除下级产品','code'=>0];
        }else{
	        $query=$model->delete();
	        if($query){
	        	$data=['msg'=>'删除成功','code'=>1,'url'=>Url::to(['index'])];
	        }else{
	        	$data=['msg'=>'删除失败','code'=>0];
	        }
        }
        return \Yii::createObject([
        		'class'=>'yii\web\Response',
        		'format'=>\yii\web\Response::FORMAT_JSON,
        		'data'=>$data
        		]);
    }

    /**
     * Finds the Categorys model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Categorys the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categorys::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
