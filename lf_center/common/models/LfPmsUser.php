<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;

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
class LfPmsUser extends \yii\db\ActiveRecord  implements IdentityInterface
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
            // [['user_id'], 'required'],
            [['isDel'], 'integer'],
            [['user_id'], 'string', 'max' => 32],
            [['user_name'], 'string', 'max' => 10],
            [['account'], 'string', 'max' => 30],
            [['password'], 'string', 'max' => 100],
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


    /**
     * 根据给到的ID查询身份。
     *
     * @param string|integer $user_id 被查询的ID
     * @return IdentityInterface|null 通过ID匹配到的身份对象
     */
    public static function findIdentity($user_id)
    {
        return static::findOne(['user_id' => $user_id]);
    }

    /**
     * 根据 账号，姓名查询身份。
     *
     * @param string $username 被查询的 username
     * @return IdentityInterface|null 通过 username 得到的身份对象
     */
    public static function findByUsername($username)
    {
        return static::findOne(['user_name' => $username]);
    }

    public static function findByAccount($account)
    {
        return static::findOne(['account' => $account]);
    }    

    /**
     * 根据 token 查询身份。
     *
     * @param string $token 被查询的 token
     * @return IdentityInterface|null 通过 token 得到的身份对象
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string 当前用户ID
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @return int|string 当前用户账号
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return int|string 当前用户账号
     */
    public function getUsername()
    {
        return $this->user_name;
    }

    // /**
    //  * @return string 当前用户的（cookie）认证密钥
    //  */
    public function getAuthKey()
    {
    //     return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }
    
    public function isHashPassword($password)
    {
        if (!preg_match('/^\$2[axy]\$(\d\d)\$[\.\/0-9A-Za-z]{22}/', $password, $matches)
            || $matches[1] < 4
            || $matches[1] > 30
        ) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * @param array $insert
     * @return boolean
     */
    public function beforeSave($insert) 
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord || !$this->isHashPassword($this->password)) {
                $this->password = \Yii::$app->security->generatePasswordHash($this->password);
            }
            if ($this->isNewRecord) {
                $this->user_id = md5(time().rand(100000, 10000000));
            }
            return true;
        }
        return false;
    }
}
