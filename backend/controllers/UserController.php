<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use backend\models\UserSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\SignupForm;
use backend\models\ResetPasswordForm;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends BaseController
{

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
    	try {
    		$model = new ResetPasswordForm($id);
    	} catch (InvalidParamException $e) {
    		throw new BadRequestHttpException($e->getMessage());
    	}
    	$data=Yii::$app->request->post();
    	if(empty($data['ResetPasswordForm']['password'])){
    		unset($data['ResetPasswordForm']['password']);
    	}
    	
    	if ($model->load($data) && $model->validate() && $model->resetPassword()) {
    		  
    		  return $this->redirect(['index']);
    	}
    	
    	return $this->render('update', [
    			'model' => $model,
    			]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
    	if($id==1){
    		\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    		return [
    		'message' => '删除失败',
    		'code' => 100,
    		];
    	}
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
    	
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
