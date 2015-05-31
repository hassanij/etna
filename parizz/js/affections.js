function affection5(Qtab) {
    addimg('cine');
    var tab = ["61", "74", "86", "98"];
    $(".panel-title").text("Question 5/5");
    $("#panelbody").append("<div>");
    $("#panelbody > div:last").attr("class", "row");
    for (var i = 0; i < 4 ; i++) {
        $(".row").append("<div>");
        $(".row > div:last").attr("id", "row" + i).attr("class", "col-sm-3 col-md-3");
        $("#row" + i).append("<button>");
        $("#row" + i + " > button").attr("id", i).attr("class", "btn btn-primary");
        $("#row" + i + " > button").attr("style", "margin-left:5px");
	$("#" + i).text(tab[i]);
    }
    add_content(2, Qtab[4]);
    $("#2").attr("data-toggle", "modal");
    $("#2").attr("data-target", ".bs-example-modal-lg");
    $("#2").click(function() {
        request2_4_5(2);
        $(".modal-body p").remove();
        $(".modal-body").append("<p>Effectivement, la réponse était 86 cinémas!</p>");
        $(".row").remove();
        $("#panelbody > ul").remove();
        $(".modal-body > div").remove();
        $("#exit").text("EXIT");
        $("#exit").click(function() {
            location.replace("index.html");
        });
    });
}

function affection4(Qtab) {
    addimg('euro');
    var tab = ["12", "23", "27", "31"];
    $(".panel-title").text("Question 4/5");
    $("#panelbody").append("<div>");
    $("#panelbody > div:last").attr("class", "row");
    for (var i = 0; i < 4 ; i++) {
        $(".row").append("<div>");
        $(".row > div:last").attr("id", "row" + i).attr("class", "col-sm-3 col-md-3");
        $("#row" + i).append("<button>");
        $("#row" + i + " > button").attr("id", i).attr("class", "btn btn-primary");
        $("#row" + i + " > button").attr("style", "margin-left:5px");
	$("#" + i).text(tab[i]);
    }
    add_content(3, Qtab[3]);
    $("#3").attr("data-toggle", "modal");
    $("#3").attr("data-target", ".bs-example-modal-lg");
    $("#3").click(function() {
        request2_4_5(1);
        $(".modal-body").append("<p>Effectivement, la réponse était 31!</p>");
        $(".canvasjs-chart-container").remove();
        setTimeout(function() {
            $("#panelbody > p").remove();
            $(".panel-heading > img").remove();
            $(".row").remove();
            affection5(Qtab);
	   }, 1000);
    });
}

function affection3(Qtab) {
    addimg('musee');
    add_Q3(Qtab[2]);
    $("#sortable").css({"display":"block"});
    $("#panelbody").append("<div>");
    $("#panelbody > div:last").attr("class", "row");
    $(".row").append("<div>");
    $(".row > div:last").attr("id", "row").attr("class", "col-sm-3 col-md-3");
    $("#row").append("<button>");
    $("#row > button").attr("id", "0").attr("class", "btn btn-primary");
    $("#0").css({"margin-left":"5px"}).text("Valider");
    $("#0").click(function() {
	if (check()) {
	    request3();
	    add_animate3("ok");
        $(".modal-body > p").remove();
	    $("#0").attr("data-toggle", "modal");
	    $("#0").attr("data-target", ".bs-example-modal-lg");
        $(".modal-body > div").remove();
	    setTimeout(function() {
            $(".row").remove();
            $("#sortable").remove();
            $("#panelbody > p").remove();
            $(".panel-heading > img").remove();
            affection4(Qtab);
        }, 1000);
	}
	else
	    add_animate3("ko");
    });
}

function affection2(Qtab) {
    addimg('wifi1');
    switch_img();
    var tab = ["96", "196", "296", "396"];
    $(".panel-title").text("Question 2/5");
    $("#panelbody").append("<div>");
    $("#panelbody > div:last").attr("class", "row");
    for (var i = 0; i < 4 ; i++) {
        $(".row").append("<div>");
        $(".row > div:last").attr("id", "row" + i).attr("class", "col-sm-3 col-md-3");
        $("#row" + i).append("<button>");
        $("#row" + i + " > button").attr("id", i).attr("class", "btn btn-primary");
        $("#row" + i + " > button").attr("style", "margin-left:5px");
	   $("#" + i).text(tab[i]);
    }
    add_content(2, Qtab[1]);
    $("#2").attr("data-toggle", "modal");
    $("#2").attr("data-target", ".bs-example-modal-lg");
    $("#2").click(function() {
	request2_4_5(0);
	$(".modal-body p").remove();
	$(".modal-body").prepend("<p>Effectivement, la réponse était 296 hotspots!</p>");
	$(".canvasjs-chart-container").remove();
	setTimeout(function() {
            $("#panelbody > p").remove();
            $(".panel-heading > img").remove();
            $(".row").remove();
	       affection3(Qtab);
        }, 1000);
    });
}

function affection1(Qtab) {
    var tab = ["90 851", "101 787", "151 699", "200 987"];
    $(".panel-title").text("Question 1/5");
    $("#panelbody").append("<div>");
    $("#panelbody > div:last").attr("class", "row");
    for (var i = 0; i < 4 ; i++) {
       $(".row").append("<div>");
       $(".row > div:last").attr("id", "row" + i).attr("class", "col-sm-3 col-md-3");
       $("#row" + i).append("<button>");
	   $("#row" + i + " > button").attr("id", i).attr("class", "btn btn-primary");
	   $("#row" + i + " > button").attr("style", "margin-left:5px");
	   $("#" + i).text(tab[i]);
    }
    add_content(1, Qtab[0]);
    request1();
    $("#1").attr("data-toggle", "modal");
    $("#1").attr("data-target", ".bs-example-modal-lg");
    $("#1").click(function() {
        $(".modal-body").prepend("<p>Effectivement, la réponse était 101 787 lampadaires!</p>");
    	setTimeout(function() {
            $("#panelbody > p").remove();
            $(".panel-heading > img").remove();
    	    $(".row").remove();
    	    affection2(Qtab);
        }, 1000);
    });
}
function addimg(imgname) {
    $('<img/>', {
        id: 'img',
        src: 'Images/' + imgname + '.png',
        class: 'animated fadeInRightBig',
        css: {
            float: 'right',
            marginTop: '-4%'
        }
    }).appendTo('.panel-heading');
}

function switch_img() {
var interval1 = setInterval(function(){
    setTimeout(function(){
        $("#img").attr("src", "Images/wifi1.png?timestamp=" + new Date().getTime());
            }, 200);
    setTimeout(function(){
        $("#img").attr("src", "Images/wifi2.png?timestamp=" + new Date().getTime());
            }, 400);
    setTimeout(function(){
        $("#img").attr("src", "Images/wifi3.png?timestamp=" + new Date().getTime());
            }, 600);
    setTimeout(function(){
        $("#img").attr("src", "Images/wifi2.png?timestamp=" + new Date().getTime());
            }, 800);
    }, 1000);

    setTimeout(function(){
        clearInterval(interval1);
        $("#img").attr("src", "Images/wifi3.png?timestamp=" + new Date().getTime());
    }, 10000);
}

$(function() {
  $('.sortable').sortable();
  $('.handles').sortable({
        handle: 'span'
    });
    $('.connected').sortable({
        connectWith: '.connected'
    });
    $('.exclude').sortable({
        items: ':not(.disabled)'
    });
});

var Qtab = ["Combien y a-t-il de lampadaires dans Paris ?",
	        "Combien y a-t-il de hotspots dans Paris ?",
            "Classez les Musées suivants par popularité:",
            "Combien de distributeurs de preservatifs a prix réduit y a-t-il dans Paris ?",
            "Combien de cinéma y a-t-il dans Paris ?"];

affection1(Qtab);