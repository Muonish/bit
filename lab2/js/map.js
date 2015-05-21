var map;

function geolocationSuccess(position) {
	// Преобразуем местоположение в объект LatLng
	var location = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
	
	// Отображаем эту точку на карте
	map.setCenter(location);
	
	var marker = new google.maps.Marker({
			position: location,
			map: map,
			title: 'You are here!'
	});
}

window.onload = function() {
	
	// Устанавливаем некоторые параметры карты. В данном примере 
	// устанавливаются начальный уровень масштабирования и тип карты. 
	// Информацию о других параметрах см. в документации по Google Maps.
	var myOptions = {
        zoom: 13,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
	
	// Создаем карту, используя установленные выше параметры
	map = new google.maps.Map(document.getElementById('mapSurface'), myOptions);
	
	// Пытаемся определить местоположение пользователя
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(geolocationSuccess);
	}
}