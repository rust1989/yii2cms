<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "categorys".
 *
 * @property string $id
 * @property string $title
 * @property int $status
 * @property int $show
 * @property string $sort
 * @property string $pid
 * @property string $content
 * @property string $create_date
 * @property string $short
 */
class Categorys extends \yii\db\ActiveRecord
{
	public $tree = [] ;
	public $treelist=[];
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorys';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','title_en'], 'required'],
            [['status', 'show', 'sort', 'pid'], 'integer'],
            [['content','content_en'], 'string'],
            [['create_date'], 'safe'],
            [['title', 'short'], 'string', 'max' => 255],
            ['pid', 'default', 'value' =>0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' =>Yii::t('app','Title'),
            'title_en' =>Yii::t('app','Title').'(en)',
            'status' =>Yii::t('app','Status'),
            'show' => Yii::t('app','Show'),
            'sort' => Yii::t('app','Sort'),
            'pid' => Yii::t('app','Pid'),
            'content' => Yii::t('app','Content'),
            'content_en' => Yii::t('app','Content').'(en)',
            'create_date' => Yii::t('app','Create Date'),
            'short' =>Yii::t('app','Short'),
            'short_en' =>Yii::t('app','Short').'(en)',
        ];
    }
    /**
     * @inheritdoc
     *
     */
    
    public function getData()
    {
    	//$cates = LibClass::find()->asArray()->all();
    	$cates = Categorys::find()->all();
    	$cates = ArrayHelper::toArray($cates);
    	return $cates;
    }
    public function getCatTree($cats , $bclassid = 0, $nu = 0 )
    {
    	$bx = '&nbsp;&nbsp;│' ;
    	$nu++ ;
    	foreach ($cats as $cat){
    		$catid		= $cat['id'];
    		$catname	= $cat['title'];
    		$catbid		= $cat['pid'];
    		$islast     = 0;//$cat['islast'];
    		if ($catbid == $bclassid) {
    			$title= str_repeat($bx, $nu) .'&nbsp;&nbsp;└'. $catname . ($islast ? '_last' : '') . PHP_EOL  ;
    			$this->tree[$catid]=$title;
    			$this->treelist[$catid]=array_merge($cat,array('catname'=>$title));
    			$this->getCatTree($cats, $catid, $nu ) ;
    		}
    	}
    }
    public function treelist(){
    	$cats = $this->getData();
    	$this->getCatTree($cats, 0, 0);
    	return $this->treelist ;
    }
    public function tree() {
    	$cats = $this->getData();
    	$this->getCatTree($cats, 0, 0);
    	return $this->tree ;
    }
}
