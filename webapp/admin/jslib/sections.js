// JavaScript Document

function changeToSection(section,button){
	$("#wait").fadeIn("fast");	
	
	$("#mainPanel").load(section,function(){
		$("#wait").stop().fadeOut("fast");	
		
		refreshPoints();
		
			
	});
	
	if(button){
		$(".navigation li").removeClass("selected");
		$(button).parent().addClass("selected");
	}
}

function closeColorbox(){
		$.colorbox.close();	
	}