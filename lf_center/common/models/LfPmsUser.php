<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%lf_pms_user}}".
 *
 * @property string $user_id
 * @property string $user_name
 * @property string $account
 * @property string $password
 * @property int $isDel
 * @property int $isModPwd
 */
class LfPmsUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lf_pms_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['isDel'], 'integer'],
            [['user_id'], 'string', 'max' => 32],
            [['user_name'], 'string', 'max' => 10],
            [['account'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 50],
            [['isModPwd'], 'string', 'max' => 1],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('common/pms_user', 'User ID'),
            'user_name' => Yii::t('common/pms_user', 'User Name'),
            'account' => Yii::t('common/pms_user', 'Account'),
            'password' => Yii::t('common/pms_user', 'Password'),
            'isDel' => Yii::t('common/pms_user', 'Is Del'),
            'isModPwd' => Yii::t('common/pms_user', 'Is Mod Pwd'),
        ];
    }
}
