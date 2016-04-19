$(document).ready(function() {

  // old code
  // $(window).width() >= 1100 ? $("#index").addClass("image") : ($(".main").removeClass("absolute"), $("#index").removeClass("image"));
  $("input[type=submit]").mouseover(function() {
    $("nav form").addClass("transition")
  }).mouseleave(function() {
    $("nav form").removeClass("transition");
  });
  $("input[type=search]").on("click",function(){
    $("nav form").addClass("transition");
    $("input[type=submit]").addClass("hover");
  }).mouseleave(function() {
    $("nav form").removeClass("transition");
    $("input[type=submit]").removeClass("hover");
  });
  if ($(".alert").length > 0 ) {
    $("input[type=text]").css("border","2px solid #ad1457");
    $("input[type=password]").css("border","2px solid #ad1457");
  }


  //own code again

  $(".fade:nth-child(1)").animate({
  opacity: 1
}, 500);
$(".fade:nth-child(2)").animate({
opacity: 1
}, 1000);
$(".fade:nth-child(3)").animate({
opacity: 1
}, 1500);
$(".fade:nth-child(4)").animate({
opacity: 1
}, 2500);
$(".fade:nth-child(5)").animate({
opacity: 1
}, 3000);
$(".fade:nth-child(6)").animate({
opacity: 1
}, 3500);




//responsive search code
if ($(window).width() <= 1025 ){
  $(".responsive").on("click", function(){
    event.stopPropagation();
    $("nav .last").toggle();
  });
  //if click on header, then search box disappears
  $("header").on("click",function(){
    $("nav .last").hide();
  });
  //fadeing magic, cheers for .scroll();
  /* okay, this doesn't work for now
  $(window).scroll(function(){

  $(".middle.fade").each(function(i){

  var lastObject = $(this).offset().top + $(this).outerHeight();
  var bottomWindow = $(window).scrollTop() + $(window).height();
  if(bottomWindow>lastObject){
  //var time = 500;
  $(this).animate({'opacity':'1'},1000);

}
});

});*/
}

//epic slider, thank you so much mr http://codepen.io/doodlemarks/pen/aFcly
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

});
