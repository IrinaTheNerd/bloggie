//jquery
$(document).ready(function(){
	//responsiveness
		if ($(window).width() >= 1100) {
			$("#index").addClass("image");

		}
		else {
			$(".main").removeClass("absolute");
			$("#index").removeClass("image");
		}
		//remove value
		$("input[type=search]").focus(function(){
			$(this).val("");
		});

		//hover effect
		$("input[type=submit]").mouseover(function(){
			$("nav form").addClass("transition");

   		 }).mouseleave(function(){
			$("nav form").removeClass("transition");

   		 });


   		 //fancy pulsing on hover need to specify classes better
   		$("a.board").hover(function(){
   		 	$(".tile h3").addClass("pulse");
   		  });


//JSON fancy stuff
//written with the help of http://javascriptbook.com/code/c08/example.html


$(function(){
	var tips;
	$.ajax({
		beforeSend: function(xhr){
			if(xhr.overrideMimeType) {
				xhr.overrideMimeType("application/json");
			}
		}
	});

function addTips(){
	$.getJSON('data/tips.json') //loading files
		.done( function(data){
			tips = data;
		}).fail( function() {                       // If a problem: show message
      $('#writing-tips').html('Sorry! We could not load the timetable at the moment');
    });
  }

addTips();

$(".new-post").on('click', '.icon-help-circled', function(e) {
	e.preventDefault();
	var loc = this.id.toUpperCase();
	 var newContent = '';                               // Build up timetable by
    for (var i = 0; i < tips[loc].length; i++) {      // looping through events
      newContent += '<p>' + tips[loc][i] + '</p>';
    }

    $('#writing-tips').html(newContent); // Display times on page


});
});

	});
