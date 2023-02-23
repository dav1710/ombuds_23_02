var Markers = [
	{x:"40.184822", y:"44.509730", popup:"Երևանի աշխատակազմ"},
	{x:"39.207909", y:"46.4047959", popup:"Սյունիքի մարզային ստորաբաժանում"},
	{x:"40.784404", y:"43.8053866", popup:"Շիրակի մարզային ստորաբաժանում"},
	{x:"40.354582", y:"45.1195619", popup:"Գեղարքունիքի մարզային ստորաբաժանում"},
	{x:"40.8895931", y:"45.1342821", popup:"Տավուշի մարզային ստորաբաժանում"}
]
$('.leaflet-control-attribution leaflet-control').hide();
if ($(window).width() <= 1270 && !window.location.href.includes('admin')) {
	var map = L.map('map_sm', { zoomControl: false }).setView([40.1850363, 44.506963], 6);
	var vectorIcon = L.icon({
		iconUrl: '../img/Vector.png',
		iconSize:     [16, 23],
		iconAnchor:   [10, 30],
		popupAnchor:  [5, -30]
	  });
}
if($(window).width() <= 680){
    var map = L.map('map_small', { zoomControl: false }).setView([40.1850363, 44.506963], 14);
	var vectorIcon = L.icon({
		iconUrl: '../img/Vector.png',
		iconSize:     [32, 45],
		iconAnchor:   [10, 30],
		popupAnchor:  [5, -30]
	  });
}
if($(window).width() >= 1270) {
 	var map = L.map('map', { zoomControl: false }).setView([40.1850363, 44.506963], 6);
	 var vectorIcon = L.icon({
		iconUrl: '../img/Vector.png',
		iconSize:     [32, 45],
		iconAnchor:   [10, 30],
		popupAnchor:  [5, -30]
	  });
}

L.tileLayer('https://mt.google.com/vt/lyrs=m&x,h@115&hl=en&x={x}&y={y}&z={z}&s=Galil').addTo(map);



for (let i of Markers) {
    L.marker([i.x, i.y], {icon: vectorIcon}).addTo(map).bindPopup(i.popup);
	map.attributionControl.setPrefix('');
}
