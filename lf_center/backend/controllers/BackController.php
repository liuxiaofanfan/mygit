<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

/**
 * @author liufan
 * @date 2018-3-21
 * LfPmsMenuController implements the CRUD actions for LfPmsMenu model.
 */
class BackController extends Controller{
	/**
	 * 访问控制
	 */
	public function beforeAction($action){
		#如果是登录方法，直接
		if(Yii::$app->controller->action->id !== 'login'){
			if(Yii::$app->user->isGuest){
				Yii::$app->getSession()->setFlash("loginTimeOut", "Login Time Out");
				return $this->redirect(["site/login"]);
			}else{
				return true;
			}
		}else{
			return true;
		}
	} 
}