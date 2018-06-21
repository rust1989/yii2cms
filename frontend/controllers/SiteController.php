<?php
namespace frontend\controllers;
use backend\models\Banner;
/**
 * Site controller
 */
class SiteController extends BaseController
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
    	$banners=$this->getBanner('home');
    	return $this->render('index',['banners'=>$banners]);
    }

}
