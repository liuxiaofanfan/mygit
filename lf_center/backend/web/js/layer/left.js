changeSidebarMenu();

function changeSidebarMenu(){
    $.getJSON("'.Url::toRoute('site/change-modal').'", {}, function(data){
        $(".sidebar-menu").html("");
        var menustr = "";
        $.each(data, function(i, e){
            menustr += "<li><a href=\"#\"><i class=\"fa fa-folder-open\" style=\"color: ##6a6c6f;\"></i>";
            menustr += "<span>";
            menustr += e.menu_name;
            menustr += "</span><span class=\"pull-right-container\"></span></a>";
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