
$(function(){
	
$("nav .sub-menu a").click(function(){
    $(this).next("ul").slideToggle();
    $(this).children("span").toggleClass("open");

});	

$(".close").click(function(){
	$("ul li ul li").slideUp();
});

$(".tab_menu2 a").click(function(){
    $(this).next("ul").slideToggle();
    $(this).children("span").toggleClass("open");

});	

$(".close").click(function(){
	$("ul li ul li").slideUp();
});

$(".accordion dt").click(function(){
	$(this).next("dd").slideToggle();
	$(this).next("dd").siblings("dd").slideUp();
	$(this).toggleClass("open");	
	$(this).siblings("dt").removeClass("open");
});

}); 