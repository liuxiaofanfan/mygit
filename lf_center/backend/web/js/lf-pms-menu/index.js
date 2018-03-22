$(function(){
	$("#out-content").on("click", ".delete-menu-batch", function(){
        var keys = $("#menu-grid").yiiGridView("getSelectedRows");
        //console.log(keys);
        var count = keys.length;
        if(count > 0){
        	return true;
        }else{
        	showFailMsg("请选择菜单！");
        }
    });
});