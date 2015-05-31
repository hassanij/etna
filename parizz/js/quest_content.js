function add_content(nbr, quest)
{
    for (var i = 0; i < 4; i++) {
        if (i == nbr)
            $("#" + nbr).click(function() {
                $(".panel-heading").css({"background-color":"#28B62C"});
                $("#content").removeClass().addClass("animated fadeOutDownBig");
                setTimeout(function() {
                    $(".panel-heading").css({"background-color":"#75CAEB"});
                    $("#content").removeClass();
                }, 1500);
            });
        else
            $("#" + i).click(function() {
                $("#content").removeClass().addClass("animated bounce");
                $(".panel-heading").css({"background-color":"#FF4136"});
                setTimeout(function() {
                    $(".panel-heading").css({"background-color":"#75CAEB"});
                    $("#content").removeClass();
                }, 1500);
            });
    }
    $("#panelbody").prepend("<p>");
    $("#panelbody > p").text(quest);
}

function add_animate3(check)
{
    if (check == "ok")
    {
        $(".panel-heading").css({"background-color":"#28B62C"});
	$("#content").removeClass().addClass("animated fadeOutDownBig");
	setTimeout(function() {
            $(".panel-heading").css({"background-color":"#75CAEB"});
            $("#content").removeClass();
        }, 1500);
    }
    else
    {
        $("#content").removeClass().addClass("animated bounce");
	$(".panel-heading").css({"background-color":"#FF4136"});
	setTimeout(function() {
            $(".panel-heading").css({"background-color":"#75CAEB"});
            $("#content").removeClass();
        }, 1500);
    }
}

function check()
{
    var value = {};
    var museum = ["Musée du Louvre", "Château de Versailles", "Centre Georges-Pompidou",
                  "Musée d'Orsay", "Musée de l'Armée",
                  "Musée du quai Branly", "Musée Carnavalet"];
    for (var i = 0, j = 1; i < 7; i++, j++) {
        value = $(".sortable li:nth-child(" + j + ")").text();
        if (value != museum[i])
            return (false);
    }
    return (true);
}

function add_Q3(quest)
{
    $(".panel-title").text("Question 3/5");
    $("#panelbody").prepend("<p>");
    $("#panelbody > p").text(quest);
}