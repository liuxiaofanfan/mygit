<?php

namespace console\controllers;

use common\models\User;
use yii\console\Controller;

/**
* 通过命令行初始化应用
*/
class InitController extends Controller
{
	/**
	 * 初始化管理员
	 */
	public function actionUser(){
		echo "Create init user ... \n";
		$username = $this->prompt("Input UserName: ");
		$email    = $this->prompt("Input Email for $username : ");
		$password = $this->prompt("Input Password for $username : ");

		// $model = new User();
		// $model->username = $username;
		// $model->email    = $email;
		// $model->password = $password;

		// if(!$model->save()){
		// 	foreach($model->getErrors() as $errors){
		// 		foreach($errors as $e){
		// 			echo "$e \n";
		// 		}
		// 	}
		// 	return 1;
		// }
		return 0;
	}
}
