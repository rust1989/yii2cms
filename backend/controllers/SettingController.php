<?php

namespace backend\controllers;

use Yii;
use backend\models\Setting;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SettingController implements the CRUD actions for Setting model.
 */
class SettingController extends BaseController
{
    

    /**
     * Lists all Setting models.
     * @return mixed
     */
    public function actionIndex()
    {
        $list=Setting::find()->asArray()->all();
        $keys=array_column($list,'name');
        $values=array_column($list,'data'); 
        $data=array_combine($keys, $values);
        
        return $this->render('index', ['list'=>$data]);
    }
    public function  actionSave(){
    	
    	$model=new Setting();
    	$rows=array();
    	$params=\Yii::$app->request->post();
    	unset($params['_csrf-backend']);
    	
    	foreach ($params as $key=>$param){
    	    $rows[]=['name'=>$key,'data'=>$param];	
    	}
    	if(count($rows)){
    		$query=Setting::deleteAll();
    		if($query)\Yii::$app->db->createCommand()->batchInsert(Setting::tableName(),['name','data'], $rows)->execute();
    	}
    	$this->persit();
    	return Yii::createObject([
    			'class'=>'yii\web\Response',
    			'format'=>\yii\web\Response::FORMAT_JSON,
    			'data'=>[
    			'msg'=>'操作成功'
    			]
    			]); 
    }
    protected function persit(){
    	$list=Setting::find()->asArray()->all();
    	 
    	$html="<?php\r\n";
    	$html.="return [\r\n";
    	if(count($list)){
    		$keys=array_column($list,'name');
    		$values=array_column($list,'data');
    		$data=array_combine($keys, $values);
    		foreach ($data as $k=>$v){
    			$html.='"'.strip_tags($k).'"=>"'.htmlspecialchars($v).'",'."\r\n";
    		}
    	}
    	 
    	$html.="\r\n];";
    	$html.="\r\n?>";
    	 
    	$path=\Yii::$app->getBasePath();
    	$url=$path.'/../common/config/params.php';
    	file_put_contents($url, $html);
    }
}
