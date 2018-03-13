<?php

namespace console\controllers;

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

	}
}