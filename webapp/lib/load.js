$(document).ready(function(){

	$("html").click(function(){
		
		$("#faq ul li div").slideUp("slow");
	});

	$("#faq").find("li").click(function(){
		
		$("#faq ul li div").slideUp("slow");
		
		$(this).find("div").slideDown("fast");
		
		
		
		return false;
	});
	
	$("#faq li div").click(function(){
		//$(this).fadeOut("slow");	
		return false;
	});
	
	
	$("#faq").find("a").click(function(){
		window.location = $(this).attr("href");
		return false;	
	});
	

});

function goTop() {
    
    $('html').animate({scrollTop : 0},'slow');
    
}


function goFAQ() {
    
    var scr = $("#faq").offset().top -60;
    $('html').animate({scrollTop : scr},'slow');
    
}


function goReg() {
    
    var scr = $("#registro").offset().top -60;
    $('html').animate({scrollTop : scr},'slow');
    
}

function showAnswer(){
	alert(this);
	$(this).find("div").slideUp("fast");
	}