$(function(){
	// $(document).pjax('ul.sidebar-menu.tree a', '#pjax-container', {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#pjax-container"});

	// $(document).on("pjax:end",function(){
 //    });

	$(".child-menu").click(function(){
		$(".child-menu").removeClass("active-menu");
		$(this).addClass("active-menu");
	});
});

function showInfoMsg(str, timeout){
	if($("#msg-box div").length >= 10){
		return false;
	}
    if(timeout == null){
        timeout = 2000;
    }
    var id = "msg_"+Date.parse(new Date());
    var msg_item = $('<div class="msg-box-item msg-info"><span>'+id+"|"+str+'</span><i class="glyphicon glyphicon-remove"></i></div>');
    $("#msg-box").append(msg_item);
    msg_item.addClass("animated rubberBand");

    setTimeout(function(){
        msg_item.removeClass("rubberBand");
        msg_item.addClass("fadeOutRight");
    }, timeout);

    setTimeout(function(){
        msg_item.remove();
    }, timeout+500);
}