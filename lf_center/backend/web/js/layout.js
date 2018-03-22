$(function(){
	// $(document).pjax('ul.sidebar-menu.tree a', '#pjax-container', {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#pjax-container"});

	// $(document).on("pjax:end",function(){
 //    });

	$(".child-menu").click(function(){
		$(".child-menu").removeClass("active-menu");
		$(this).addClass("active-menu");
	});
});

function showInfoMsg(str, time, timeout){
    if(time == null){
        time = 600;
    }
    if(timeout == null){
        timeout = 1000
    }

    var msg_item = $('<div class="msg-box-item msg-info"><span>'+str+'</span><i class="glyphicon glyphicon-remove-circle"></i></div>');
    $("#msg-box").append(msg_item);
}