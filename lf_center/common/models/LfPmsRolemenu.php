<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%lf_pms_rolemenu}}".
 *
 * @property int $id
 * @property string $role_id
 * @property string $menu_id
 */
class LfPmsRolemenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lf_pms_rolemenu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id', 'menu_id'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common/pms_role_menu', 'ID'),
            'role_id' => Yii::t('common/pms_role_menu', 'Role ID'),
            'menu_id' => Yii::t('common/pms_role_menu', 'Menu ID'),
        ];
    }
}
