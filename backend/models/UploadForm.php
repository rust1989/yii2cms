<?php
namespace backend\models;
use yii\base\Model;
class UploadForm extends Model{
	public $image;
	public function rules(){
		   return [
		      [['image'],'file','skipOnEmpty'=>false,'extensions'=>'png,jpg,gif,jpeg,pdf'],
		   ];
	}
	public function upload(){
		if($this->validate()){
			$date=date("Ymd");
			$name=uniqid();
			$dir='uploads'.DIRECTORY_SEPARATOR.$date;
			if(!file_exists($dir))@mkdir($dir,0755);
			
			$file=$dir.DIRECTORY_SEPARATOR.$name.'.'.$this->image->extension;
			$this->image->saveAs($file);
			return ['file'=>$file];
		}else{
			return false;
		}
	}
}