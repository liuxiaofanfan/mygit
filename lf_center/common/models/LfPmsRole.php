<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%lf_pms_role}}".
 *
 * @property string $role_id
 * @property string $role_name
 * @property string $role_describe
 */
class LfPmsRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lf_pms_role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id'], 'required'],
            [['role_id'], 'string', 'max' => 32],
            [['role_name'], 'string', 'max' => 16],
            [['role_describe'], 'string', 'max' => 50],
            [['role_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'role_id' => Yii::t('common/pms_role', 'Role ID'),
            'role_name' => Yii::t('common/pms_role', 'Role Name'),
            'role_describe' => Yii::t('common/pms_role', 'Role Describe'),
        ];
    }
}
