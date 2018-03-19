<?php

namespace common\helper\rbac;

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
			$menuItems = self::getMenuByUser($userId);
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
        $menuEndItems = static::renderItem($menuLastItems);
        return $menuEndItems;
    }

    /**
     * 根据层级形成菜单树
     * @param  [type] $menuItems [description]
     * @return [type]            [description]
     */
    public static function renderItem($menuItems = null)
    {
        $refer = array();
        $tree = array();
        foreach($menuItems as $k => $v){
            $refer[$v['menu_id']] = & $menuItems[$k]; //创建主键的数组引用
        }
        foreach($menuItems as $k => $v){
            $pid = $v['parent_id'];  //获取当前分类的父级id
            if($pid == null){
                $tree[] = & $menuItems[$k];  //顶级栏目
            }else{
                if(isset($refer[$pid])){
                    $refer[$pid]['data'][] = & $menuItems[$k]; //如果存在父级栏目，则添加进父级栏目的子栏目数组中
                }
            }
        }
        return $tree;
    }
}