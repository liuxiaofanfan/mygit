$(function(){
	$("#out-content").on("click", ".delete-menu-batch", function(){
		alert("123");
        var keys = $("#menu-grid").yiiGridView("getSelectedRows");
        console.log(keys);
    });
});