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
    public $defaultIconHtml = '<i class="glyphicon glyphicon-file"></i> ';
    public static $iconClassPrefix = '<i class="glyphicon glyphicon-';

    
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

    /**
     * @inheritdoc
     */
    protected function normalizeItems($items, &$active)
    {
        foreach ($items as $i => $item) {
            if (isset($item['visible']) && !$item['visible']) {
                unset($items[$i]);
                continue;
            }
            if (!isset($item['label'])) {
                $item['label'] = '';
            }
            $encodeLabel = isset($item['encode']) ? $item['encode'] : $this->encodeLabels;
            $items[$i]['label'] = $encodeLabel ? Html::encode($item['label']) : $item['label'];
            $items[$i]['icon'] = isset($item['icon']) ? $item['icon'] : '';
            $hasActiveChild = false;
            if (isset($item['items'])) {
                $items[$i]['items'] = $this->normalizeItems($item['items'], $hasActiveChild);
                if (empty($items[$i]['items']) && $this->hideEmptyItems) {
                    unset($items[$i]['items']);
                    if (!isset($item['url'])) {
                        unset($items[$i]);
                        continue;
                    }
                }
            }
            if (!isset($item['active'])) {
                if ($this->activateParents && $hasActiveChild || $this->activateItems && $this->isItemActive($item)) {
                    $active = $items[$i]['active'] = true;
                } else {
                    $items[$i]['active'] = false;
                }
            } elseif ($item['active']) {
                $active = true;
            }
        }
        return array_values($items);
    }
    /**
     * Checks whether a menu item is active.
     * This is done by checking if [[route]] and [[params]] match that specified in the `url` option of the menu item.
     * When the `url` option of a menu item is specified in terms of an array, its first element is treated
     * as the route for the item and the rest of the elements are the associated parameters.
     * Only when its route and parameters match [[route]] and [[params]], respectively, will a menu item
     * be considered active.
     * @param array $item the menu item to be checked
     * @return boolean whether the menu item is active
     */
    protected function isItemActive($item)
    {
        if (isset($item['url']) && is_array($item['url']) && isset($item['url'][0])) {
            $route = $item['url'][0];
            if ($route[0] !== '/' && Yii::$app->controller) {
                $route = Yii::$app->controller->module->getUniqueId() . '/' . $route;
            }
            $arrayRoute = explode('/', ltrim($route, '/'));
            $arrayThisRoute = explode('/', $this->route);
            if ($arrayRoute[0] !== $arrayThisRoute[0]) {
                return false;
            }
            if (isset($arrayRoute[1]) && $arrayRoute[1] !== $arrayThisRoute[1]) {
                return false;
            }
            if (isset($arrayRoute[2]) && $arrayRoute[2] !== $arrayThisRoute[2]) {
                return false;
            }
            unset($item['url']['#']);
            if (count($item['url']) > 1) {
                foreach (array_splice($item['url'], 1) as $name => $value) {
                    if ($value !== null && (!isset($this->params[$name]) || $this->params[$name] != $value)) {
                        return false;
                    }
                }
            }
            return true;
        }
        return false;
    }
}