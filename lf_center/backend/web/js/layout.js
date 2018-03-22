$(function(){
	// $(document).pjax('ul.sidebar-menu.tree a', '#pjax-container', {"push":true,"replace":false,"timeout":1000,"scrollTo":false,"container":"#pjax-container"});

	// $(document).on("pjax:end",function(){
 //    });

	$(".child-menu").click(function(){
		$(".child-menu").removeClass("active-menu");
		$(this).addClass("active-menu");
	});
});

function showFailMsg(str, time, timeout){
    if(time == null){
        time = 600;
    }
    if(timeout == null){
        timeout = 1000
    }
    $("#fail-msg").html(str).slideDown(time);
    setTimeout(function(){
        $("#fail-msg").slideUp(time);
    },timeout);
}