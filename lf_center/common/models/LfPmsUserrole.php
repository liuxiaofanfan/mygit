<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%lf_pms_userrole}}".
 *
 * @property int $id
 * @property string $user_id
 * @property string $role_id
 */
class LfPmsUserrole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lf_pms_userrole}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'role_id'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/pms_user_role', 'ID'),
            'user_id' => Yii::t('common/pms_user_role', 'User ID'),
            'role_id' => Yii::t('common/pms_user_role', 'Role ID'),
        ];
    }
}
