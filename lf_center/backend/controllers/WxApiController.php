<?php
namespace backend\controllers;

use Yii;
use common\models\WxPic;
use yii\helpers\Json;
use yii\web\Controller;

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
		$res = [];
		foreach($banner as $key => $value) {
			$res['ID'] = $value['ID'];
			$res['PIC_URL'] = Yii::$app->params['domain'].Yii::$app->params['imageUploadSuccessPath'].$value['PIC_URL'];
		}
		exit(Json::htmlEncode($res));
	}
}