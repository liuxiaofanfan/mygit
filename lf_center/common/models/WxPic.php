<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%wx_pic}}".
 *
 * @property int $ID 图片ID
 * @property string $PIC_URL 图片地址
 * @property int $PIC_POS 图片位置
 * @property string $UTIME 上传时间
 * @property string $UADMIN 上传者
 */
class WxPic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wx_pic}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PIC_POS'], 'integer', "请选择图片位置"],
            [['UTIME'], 'safe'],
            [['PIC_URL'], 'string', 'max' => 100],
            [['UADMIN'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('common/wx_pic', 'ID'),
            'PIC_URL' => Yii::t('common/wx_pic', 'PIC_URL'),
            'PIC_POS' => Yii::t('common/wx_pic', 'PIC_POS'),
            'UTIME' => Yii::t('common/wx_pic', 'UTIME'),
            'UADMIN' => Yii::t('common/wx_pic', 'UADMIN'),
        ];
    }
}
