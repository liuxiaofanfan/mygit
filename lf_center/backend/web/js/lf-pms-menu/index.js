$(function(){
	$("#out-content").on("click", ".delete-menu-batch", function(){
        var keys = $("#menu-grid").yiiGridView("getSelectedRows");
        console.log(keys);
    });
});