$(function(){
	$("#out-content").on("click", ".delete-menu-batch", function(){
        var keys = $("#grid").yiiGridView("getSelectedRows");
        console.log(keys);
    });
});