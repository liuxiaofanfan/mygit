<?php

namespace console\controllers;

use common\models\LfPmsUser;
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
		$account  = $this->prompt("Input Account for $username : ");
		$password = $this->prompt("Input Password for $username : ");

		$model = new LfPmsUser();
		$model->user_name = $username;
		$model->account   = $account;
		$model->password  = $password;

		if(!$model->save()){
			foreach($model->getErrors() as $errors){
				foreach($errors as $e){
					echo "$e \n";
				}
			}
			return 1;
		}
		return 0;
	}
}
