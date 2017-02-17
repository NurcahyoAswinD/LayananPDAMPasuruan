var map;
var markers = [];
$("#map-canvas").on("click",function(){
	initialize();
});
function initialize(Lat="-7.6508148", Long="112.8997553",id="map-canvas") {
	var mapOptions = {
		zoom: 18,
		center: new google.maps.LatLng(Lat, Long)
	};
	map = new google.maps.Map(document.getElementById(id), mapOptions);
	if(id == "map-canvas"){
		google.maps.event.addListener(map, 'mousedown', addLatLng);
	}
	var marker = new google.maps.Marker({
		position: new google.maps.LatLng(Lat, Long),
		title: 'Simple GIS',
		map: map
	});
	markers.push(marker);
}
function addLatLng(event) {
	setMapOnAll(null);
	var marker = new google.maps.Marker({
		position: event.latLng,
		title: 'Simple GIS',
		map: map
	});
	markers.push(marker);
	var lat = event.latLng.lat();
	var lng = event.latLng.lng();
	$('#latitude').val(lat);
	$('#longitude').val(lng);
}
function setMapOnAll(map) {
	for (var i = 0; i < markers.length; i++) {
		markers[i].setMap(map);
	}
	markers = [];
}
$(".showmap").on("click",function(){
	var id = $(this).data("map");
	$("#"+id).show("slow",function(){
		initialize($(this).data("lat"),$(this).data("long"),id);
	});
});
/* /////////////////////////////////////////// UwU /////////////////////////////////////////////*/

$(":radio").click(function(){
	if($(this).val() == "1"){
		$("#form1").show();
		$("#form1 input[type=text]").focus();
	}else{
		$("#form1").hide();
	}
});
$('#idsearch').keyup(function () {
	var valThis = this.value.toLowerCase();
	$('.panel-group>div').each(function () {
		var id  = $(this).data('id');
		textL = id.toLowerCase();
		if(textL.indexOf(valThis) != 0) { 
			$(this).hide();
		}else{
			$(this).show();
		}
	});
});
var job;
$("[data-toggle=buttons]>label").on("click",function(){
	job = $(this).parent().data("job");
	$(this).children().prop("checked",!$(this).children().prop("checked"));
});
$("input[data-trigger=filter]").on("change",function(){
	var selected = {};
	var list = $(".panel-"+job);
	if($("input[type=checkbox]:checked").length > 0){
		$("input[type=checkbox]:checked").each(function(){
			if(!selected.hasOwnProperty($(this).data("filter"))){
				selected[$(this).data("filter")]=[];
			}
			selected[$(this).data("filter")].push($(this).val());
		});
		var kat = {};
		list.hide();
		list.each(function(){
			if(job == "pengaduan"){
				if($.inArray($(this).data("kerusakan"),selected['kerusakan']) != -1){
					var kerusakan = true;
				}
				if($.inArray($(this).data("status"),selected['status']) != -1){
					var status = true;
				}
				if(kerusakan || status){
					$(this).show();
				}
			}else{

				if($.inArray($(this).data("status"),selected['status']) != -1){
					$(this).show();
				}
			}
		});
	}else{
		list.show();
	}
});
$("[data-link]").on("click",function(){
	window.location.href = $(this).data("link");
});
