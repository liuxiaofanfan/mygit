<?php
namespace common\widgets;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Menu;
/**
 * Class Menu
 * Theme menu widget.
 */
class MyMenu extends Menu
{
    public $ulTemplate = '<ul class="sidebar-menu tree" data-widget="tree">{content}</ul>';
    public $spanArow = '<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>';
    public $childUl = '<ul class="treeview-menu">{content}</ul>';
    public $liRow = '<li class="treeview">{content}</li>';
    public $liRow_child = '<li class="child-menu">{content}</li>';
    public $defaultIconHtml = '<i class="fa fa-circle-o"></i> ';
    public static $iconClassPrefix = '<i class="fa fa-';

    
    /**
     * Renders the menu.
     */
    public function run()
    {
        // 检测到有权限菜单
        if ($this->items) {
            $items = $this->renderItems($this->items);
            $result = str_replace('{content}', $items, $this->ulTemplate);
            return $result;
        }
    }

    protected function renderItems($items)
    {
        if($items) {
            $liRow = '';
            foreach($items as $item){
                if($item['icon']){
                    $icon = self::$iconClassPrefix . $item['icon'] . '"></i>';
                }else{
                    $icon = $this->defaultIconHtml;
                }
                if(isset($item['items'])){
                    $liRowContent = $icon . Html::tag('span', $item['menu_name'], ['class' => 'menu_span']) . $this->spanArow;
                    $liRowUlarea = str_replace('{content}', $this->renderItems($item['items']), $this->childUl);
                }else{
                    $liRowContent = $icon . Html::tag('span', $item['menu_name']);
                    $liRowUlarea = '';
                }
                $liRowHref = Html::a($liRowContent, [$item['target_url']], ['class' => 'level', 'data-id' => $item['menu_id'], 'data-parent' => $item['parent_id'], 'data-level' => $item['menu_level'], 'data-url' => $item['target_url']]);
                if(isset($item['items'])){
                    $liRow .= str_replace('{content}', $liRowHref . $liRowUlarea, $this->liRow);
                }else{
                    $liRow .= str_replace('{content}', $liRowHref . $liRowUlarea, $this->liRow_child);
                }
            }
            return $liRow;
        }
    }
}