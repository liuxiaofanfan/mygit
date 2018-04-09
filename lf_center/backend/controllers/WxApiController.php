<?php
namespace backend\controllers;

use common\models\WxPic;
use yii\helpers\Json;

/**
 * @author liufan
 * 微信小程序API
 */
class WxApiController extends Controller{

	/**
	 * 获取顶部轮播图片
	 */
	public function actionGetBanner(){
		$banner = WxPic::find()->where([
			'PIC_POS' => 1
		])->asArray()->all();
		Yii::info(print_r($banner), "LFTEST");
		exit(Json::htmlEncode($banner));
	}
}