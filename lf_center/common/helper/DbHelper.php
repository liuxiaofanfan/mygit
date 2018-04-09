<?php
namespace common\helper;

use common\models\LfPmsUser;

class DbHelper {
	/**
	 * @author liufan
	 * 通过管理员id 返回管理员名称
	 * @param  [type] $user_id [管理员ID]
	 * @return [type]          [description]
	 */
	public static function getUserNameById($user_id){
		$user = LfPmsUser::findOne(['user_id' => $user_id]);
		if($user){
			return $user->user_name;
		}
	}	
}