$(function(){
	$(document).pjax('ul.sidebar-menu.tree a', '#out-content', {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#out-content"});

	$(document).on("pjax:end",function(){
       $("#out-content").on("click", ".delete-menu-batch", function(){
			alert("456");
	        var keys = $("#menu-grid").yiiGridView("getSelectedRows");
	        console.log(keys);
	    });
    });

	$(".child-menu").click(function(){
		$(".child-menu").removeClass("active-menu");
		$(this).addClass("active-menu");
	});

});