// JavaScript Document

	var map ;
	var current_points=Array();
	  
	function initialize(position) {
		  
		var iniposLat =  -34.397;
		var iniposLon = 150.644;
		
		
		if(position != null){
			iniposLat =  position.coords.latitude;
			iniposLon = position.coords.longitude;
		}
		  
		var mapOptions = {
			center: new google.maps.LatLng(iniposLat, iniposLon),
			zoom: 5,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		
		map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

		setpointers();
	}
	  
	function error(msg) {
		initialize(null);
	}

	function loadMap(){
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(initialize, error);
		}else{
			initialize(null);
		}
	}
	
	function setPoint(latitud, longitud){
		
//		alert(latitud+" "+longitud);
		
		var myLatlng = new google.maps.LatLng(latitud,longitud);

		var marker = new google.maps.Marker({
			position: myLatlng,
			title:"punto"
		});
		// To add the marker to the map, call setMap();
		marker.setMap(map);
		
		current_points.push(marker);
				
	}
	
	function refreshPoints(){
		
		for (i in current_points){
			current_points[i].setMap(null);
		}
		
		current_points=Array();
		
		setpointers();
		
	}