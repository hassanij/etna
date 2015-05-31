$('<img/>', {
    id: 'img',
    src: 'Images/lamp1.png',
    class: 'animated fadeInRightBig',
    css: {
        float: 'right',
        marginTop: '-4%'
    }
}).appendTo('.panel-heading');

var interval1 = setInterval(function () {
    setTimeout(function () {
        $("#img").attr("src", "Images/lamp2.png?timestamp=" + new Date().getTime());
    }, 200);
    setTimeout(function () {
        $("#img").attr("src", "Images/lamp3.png?timestamp=" + new Date().getTime());
    }, 400);
    setTimeout(function () {
        $("#img").attr("src", "Images/lamp1.png?timestamp=" + new Date().getTime());
    }, 600);
    setTimeout(function () {
        $("#img").attr("src", "Images/lamp2.png?timestamp=" + new Date().getTime());
    }, 800);
}, 1000);

setTimeout(function () {
    clearInterval(interval1);
    $("#img").attr("src", "Images/lamp3.png?timestamp=" + new Date().getTime());
}, 2000);

