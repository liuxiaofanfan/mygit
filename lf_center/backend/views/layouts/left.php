<?php

use yii\helpers\Url;
use yii\web\View;

$this->registerJs('
function changeSidebarMenu(){
        $.getJSON("'.Url::toRoute('site/assign-menu').'", {}, function(data){
            $(".menu-level-one").remove();
            var menustr = "";
            $.each(data, function(i, e){
                menustr += "<li class=\"treeview menu-level-one\"><a href=\"#\"><i class=\"fa fa-folder-open\" style=\"color: ##6a6c6f;\"></i>";
                menustr += "<span>";
                menustr += e.menu_name;
                menustr += "</span><span class=\"pull-right-container\"></span><span class=\"pull-right-container\"><i class=\"fa fa-angle-left pull-right\"></i></span></a>";
                if(e.items != null){
                    menustr += "<ul class=\"treeview-menu\">";
                    $.each(e.items, function(i2, e2){
                        menustr += "<li><a class=\"son_menu\" href=\"javascript:;\" myhref=\"index.php?r="+e2.target_url+"\"><i class=\"fa fa-file\"></i><span>";
                        menustr += e2.menu_name;
                        menustr += "</span></a></li>";
                    });
                    menustr += "</ul>";
                }
                menustr += "</li>";
            });
            $(".sidebar-menu").append(menustr);
        });
    }
    changeSidebarMenu();
', View::POS_END);
?>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
