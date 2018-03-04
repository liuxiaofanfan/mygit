<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%lf_pms_menu}}".
 *
 * @property string $menu_id
 * @property string $menu_name
 * @property int $menu_level
 * @property string $parent_id
 * @property string $target_url
 * @property int $sequence
 */
class LfPmsMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%lf_pms_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['menu_id'], 'required'],
            [['menu_level', 'sequence'], 'integer'],
            [['menu_id', 'parent_id'], 'string', 'max' => 32],
            [['menu_name'], 'string', 'max' => 16],
            [['target_url'], 'string', 'max' => 30],
            [['menu_id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => Yii::t('common/pms_menu', 'Menu ID'),
            'menu_name' => Yii::t('common/pms_menu', 'Menu Name'),
            'menu_level' => Yii::t('common/pms_menu', 'Menu Level'),
            'parent_id' => Yii::t('common/pms_menu', 'Parent ID'),
            'target_url' => Yii::t('common/pms_menu', 'Target Url'),
            'sequence' => Yii::t('common/pms_menu', 'Sequence'),
        ];
    }
}
