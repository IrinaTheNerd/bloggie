$(document).ready(function() {
    function i() {
        $("#slider ul").animate({
            left: +t
        }, 200, function() {
            $("#slider ul li:last-child").prependTo("#slider ul"), $("#slider ul").css("left", "");
        });
    }

    function e() {
        $("#slider ul").animate({
            left: -t
        }, 200, function() {
            $("#slider ul li:first-child").appendTo("#slider ul"), $("#slider ul").css("left", "");
        });
    }
    $(window).width() >= 1100 ? $("#index").addClass("image") : ($(".main").removeClass("absolute"), $("#index").removeClass("image")), $("input[type=search]").focus(function() {
        $(this).val("");
    }), $("input[type=submit]").mouseover(function() {
        $("nav form").addClass("transition")
    }).mouseleave(function() {
        $("nav form").removeClass("transition");
    }), $("a.board").hover(function() {
        $(this > ".title").addClass("pulse");
    });
    var l = $("#slider ul li").length,
        t = $("#slider ul li").width(),
        n = $("#slider ul li").height(),
        s = l * t;
    $("#slider").css({
        width: t,
        height: n
    }), $("#slider ul").css({
        width: s,
        marginLeft: -t
    }), $("#slider ul li:last-child").prependTo("#slider ul"), $("a.control_prev").click(function() {
        i();
    }), $("a.control_next").click(function() {
        e();
    });
    $(".fade:nth-child(1)").animate({
        opacity: 1
    }, 5000);
    $(".fade:nth-child(2)").animate({
        opacity: 1
    }, 7000);
     $(".fade:nth-child(3)").animate({
        opacity: 1
    }, 9000);
});
