function content()
{
	options = {1: "TF1", 2: "France 2", 3: "France 3", 4: "Canal +", 5: "France 5", 6: "M6", 7: "Arte", 8: "D8", 9: "W9", 10: "TMC", 11: "NT1", 12: "NRJ12", 13: "LCP",
	       14: "France 4", 15: "BFM TV", 16: "iTele", 17: "D17", 18: "Gulli", 19:"France O", 20:"HD1", 21: "L'equipe", 22: "6ter", 23: "Numero 23", 24: "RMC",
	       25: "Cherie 25", 26: "RTL9", 27: "AB1", 28: "TV5 Monde", 29: "Paramount", 30: "Paris Premiere", 31: "Canal plus Cinema", 32:"Canal plus Sport",
	       33:"Canal plus Family", 34: "Canal plus Decale", 35: "Bein 1", 36: "Bein 2"};
    for (var i = 1; i < 37; i++) {
		$("#lg-menu").append("<li>");
		$("#lg-menu > li:last").attr("class", "active");
		$("#lg-menu > li:last").append("<a>");
		$("#lg-menu > li:last > a").attr("id", i);
		$("#" + i).text(options[i]);
		$("#" + i).click(function() {
			 	$("#debut").hide();
			 	$(".padding").show();
			    get_content($(this)[0].id);
			 });
	}

}

function get_content(channel)
{
    var url_fin = "http://192.168.211.43/tivine/get_content.php?id=" + channel;
	$.ajax({
		type : "POST",
		url : url_fin,
		success : function(data) {
			var now = new Date();
			var heure   = now.getHours();
			var minute  = now.getMinutes();
			if (minute < 10)
				var act = heure+"0"+minute;
			else
				var act = heure+""+minute;
			
			data = JSON.parse(data);
			var debut1 = ((data.timestart[0] + "" + data.timestart[1]) * 60);
			var debut2 = (data.timestart[2] + "" + data.timestart[3]);
			var debut = parseInt(debut1) + parseInt(debut2);
			var fin = (parseInt((data.timeend[0] +""+data.timeend[1])*60)) + parseInt((data.timeend[2] +""+ data.timeend[3]));
			var mil = (heure * 60)  + minute;
			var	time_total = fin - debut;
			var time_left = fin - mil;
			var percent = ((time_total - time_left)/time_total)*100;
			$("#prog").attr("style", "width:" +percent+"%");
			$("#image_chaine").attr('src', "images/" + channel + ".png");
			var image = data.image.replace(/%3Fv%3D[0-9]$/g, "");
			$(".panel-body > img").attr('src', image);
		    $(".lead").text(data.emission);
		    $(".lead_heure").text(data.timestart[0] + data.timestart[1] + "h" + data.timestart[2] + data.timestart[3]  + "-" + data.timeend[0] + data.timeend[1] + "h" + data.timeend[2] + data.timeend[3]);
		    $(".panel-heading > h4").text(data.hashtag);
		    var cast = data.caster;
		    var new_cast = cast.replace(/<cast>/gi, " ");
		    var new_cast = new_cast.replace(/<\/cast>/gi, " ");
		    var new_cast = new_cast.replace(/<presenter>/gi, " ");
			var new_cast = new_cast.replace(/<\/presenter>/gi, " ");
			var new_cast = new_cast.replace(/<actor>/gi, " ");
			var new_cast = new_cast.replace(/<\/actor>/gi, " ");
			var new_cast = new_cast.replace(/<director>/gi, " ");
			var new_cast = new_cast.replace(/<\/director>/gi, " ");
			$(".lead_pre").text("");
			if($.trim(new_cast) != "")
				$(".lead_pre").text("par " + new_cast);
			$(".lead_desc").text(data.resume);
		}	
	});

	var url_fin2 = "http://192.168.211.43/tivine/get_words.php?id=" + channel;
    $.ajax({
		type : "POST",
		url : url_fin2,
		success : function(data) {
	    data = JSON.parse(data);
	    var words = data.words.split(', ');
	    var l = words.length;
	    $("#words > p").text("");
	    for (var i = 1; i < l; i++) {
			$("#words").append('<p>');
			$("#words > p:nth-child(" + i + ")").text(i + ". " + words[i]);
	    }
	}
    });



}

content();
$(".padding").hide();