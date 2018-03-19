<?php

namespace common\helper\rbac;

use Yii;
use common\models\LfPmsMenu;
use common\models\LfPmsRolemenu;
use common\models\LfPmsUserrole;

/**
 * @author liufan
 * @date 2018-3-19
 * 【工具类】获取菜单相关
 */
class MenuHelper{

	/**
	 * 根据用户ID获取用于渲染菜单的菜单数据[如果有缓存数据直接读取缓存]
	 * @param  [type]  $userid  [用户id]
	 * @param  boolean $refresh 是否刷新缓存
	 * @return [type]           返回菜单数组
	 */
	public static function getAssignedMenu($userid, $refresh = false){
		$key = [__METHOD__, $userid];
		$cache = Yii::$app->cache;
		if($refresh){
			$cache->flush();
		}
		if(!$cache->get($key)){
			$menuItems = self::getMenuByUser($userid);
            if (!$menuItems) 
            	$menuItems= [];
            $cache->set($key, $menuItems, 86400);
		}
		$data = $cache->get($key);
		return $data;
	}

	/**
	 * 根据用户ID获取用于渲染菜单的菜单数据
	 * @param  [type] $userId [用户id]
	 * @return [type]         [description]
	 */
	public static function getMenuByUser($userId){
		#尽管一般情况下不会重复，但是这里还是去重了（因为测试的时候假数据还是可能重复的）
		$roleIds = LfPmsUserrole::find()
			->select('role_id')
			->where(['user_id' => $userId])
			->groupBy('{{lf_pms_userrole}}.role_id')
			->asArray()
			->all();
		#存放角色对应的源菜单信息
        $roles = [];
        foreach($roleIds as $value){
            $roles[] = $value['role_id'];
        }

        $menus = LfPmsRolemenu::find()
            ->select('a.*')
            ->from(LfPmsMenu::tableName().' as a')
            ->leftJoin(LfPmsRolemenu::tableName().' `b`', 'a.menu_id = b.menu_id')
            ->where(['IN', 'b.role_id', $roles])
            ->asArray()
            ->all();

        if($menus){
            #对于处理后的菜单信息进行层级递归
            $menuLastItems = self::getMenuLastItems($menus);
            return $menuLastItems;
        }
        // return $item;
        return false;
	}

	/**
	 * 通过角色ID获取菜单列表
	 * @param  [type] $roleId [角色ID]
	 * @return [type]         [description]
	 */
	public static function getMenuByRole($roleId = null){
        if($roleId){
            $menu = LfPmsRolemenu::find()
                    ->select('a.*')
                    ->from(LfPmsMenu::tableName().' as a')
                    ->leftJoin(LfPmsRolemenu::tableName().' `b`', 'a.menu_id = b.menu_id')
                    ->where(['b.role_id' => $roleId])
                    ->asArray()
                    ->all();
            return $menu;
        }
        return false;
    }

    /**
     * 对菜单数组进行排序，然后根据层级形成菜单树
     * @param  [type] $menuLastItems [description]
     * @return [type]                [description]
     */
    public static function getMenuLastItems($menuLastItems = null)
    {
        $menuEndItems = [];
        array_multisort(array_column($menuLastItems, 'menu_level'),array_column($menuLastItems, 'sequence'),SORT_ASC,$menuLastItems);
        $menuEndItems = self::getMenuList($menuLastItems);
        return $menuEndItems;
    }

    /**
	 * @author liufan
	 * @param menu 散的一层菜单列表
	 * 获取有层次的二级菜单列表(这个算法很low，后期优化)
	 */
	public static function getMenuList($menu){
	    $newMenu = [];
	    foreach($menu as $menuitem){
	        if($menuitem['menu_level'] == 1){
	            foreach($menu as $menuitem2){
	                if($menuitem2['menu_level'] == 2 && $menuitem2['parent_id'] == $menuitem['menu_id']){
	                    $menuitem['items'][] = $menuitem2;
	                }
	                continue;
	            }
	            $newMenu[] = $menuitem;
	        }
	        continue;
	    }
	    return $newMenu;
	}
}