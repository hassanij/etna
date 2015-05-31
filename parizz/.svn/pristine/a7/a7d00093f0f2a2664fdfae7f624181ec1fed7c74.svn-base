function initialize(data) {

    var options = {
	mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    window.map = new google.maps.Map(document.getElementById('map'), options);
    var bounds = new google.maps.LatLngBounds();
    for (i = 0; i < data.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(data[i][0], data[i][1]),
            map: map
        });
        bounds.extend(marker.position);
    }

    map.fitBounds(bounds);
    var listener = google.maps.event.addListener(map, "idle", function () {
	google.maps.event.trigger(map, 'resize');
	var pos = new google.maps.LatLng(48.8550, 2.3525);
	map.setCenter(pos);
	map.setZoom(12);
    });
}

function request2_4_5(nbr)
{
    var php = ["hotspots.php", "preservatifs.php", "cine.php"];
    $.ajax({
		url: "./PHP/" + php[nbr],
		type: "GET",
		success: function(data) {
		    var data = JSON.parse(data);
		    var j = 0;
		    var d = [];
		    for (var key in data) {
			d[j] = [];
			var tab = data[key].split(",");
			d[j][0] = tab[0];
			d[j][1] = tab[1];
			j++;
		    }
		    $(".modal-body").append("<div>");
		    $(".modal-body > div:last").attr("id", "map");
		    initialize(d);
		},
		error: function() {
		    console.log(Error);
		},
    })
}

function request1() {
	$.ajax({
		url: "./PHP/eclairage.php",
		type: "GET",
		success: function(data) {
			var data = JSON.parse(data);
			var geo = [];
			var i = 0;
			for (var key in data)
			{
				var tmp  = {label: key,x : i, y: data[key]};
				geo = geo.concat(tmp);
				i++;
			}
			var options = {
			title: {
				text: "Lampadaires dans Paris"
			},
			axisX: {
					labelFontSize: 1,
				},
	        animationEnabled: true,
	        zoomEnabled: true,
      		panEnabled: true,
			data: [
			{
				type: "column",
				dataPoints: 
					geo
			}
			]
		};
		$(".modal-body").CanvasJSChart(options);
		$(".modal-body").css({"width" : "800px", "height":"550px"})
			},
			error: function() {
				console.log(Error);
			},
	});
}

function request3() {
	$.ajax({
		url: "./PHP/musees.php",
		type: "GET",
		success: function(data) {
			var data = JSON.parse(data);
			var geo = [];
			var i = 0;
			for (var y = 1; y < 8; y++)
			{
				var tmp  = {label: data[y][0],x : i, y: data[y][1]};
				geo = geo.concat(tmp);
				i++;
			}
			var options = {
			title: {
				text: "Visites sur un an des principaux musées de Paris"
			},
			axisX: {
					labelFontSize: 1,
				},
	        animationEnabled: true,
	        zoomEnabled: true,
      		panEnabled: true,
			data: [
			{
				type: "pie",
				dataPoints: 
					geo
			}
			]
		};
		$(".modal-body").CanvasJSChart(options);
		$(".modal-body").css({"height" : "500px", "width":"800px"})
			},
			error: function() {
				console.log(Error);
			},
	});
}


function question(quest)
{
	$("#panelbody").prepend("<p>");
	$("#panelbody > p").text(quest);
}