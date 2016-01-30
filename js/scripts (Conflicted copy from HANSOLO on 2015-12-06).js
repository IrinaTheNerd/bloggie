//jquery
$(document).ready(function(){
	//responsiveness 
		if ($(window).width() >= 1100) {	
			$("#header").addClass("image");

		}
		else {
			$(".main").removeClass("absolute");
			$("#header").removeClass("image");
      $(".tip").addClass("mobile");
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

 });

//JSON fancy stuff
//written with the help of http://javascriptbook.com/code/c08/example.html
/*

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

*/
// NOTE: This example will not work locally in all browsers. 
// Please try it out on the website for the book http://javascriptbook.com/code/c08/
// or run it on your own server.

$(function() {                                    // When the DOM is ready

  var times;                                      // Declare global variable
  $.ajax({
    beforeSend: function(xhr) {                   // Before requesting data
      if (xhr.overrideMimeType) {                 // If supported
        xhr.overrideMimeType("application/json"); // set MIME to prevent errors
      }
    }
  });

  // FUNCTION THAT COLLECTS DATA FROM THE JSON FILE
  function loadStuff() {                    // Declare function
    $.getJSON('data/hints.json')              // Try to collect JSON data
    .done( function(data){                      // If successful
      times = data;                             // Store it in a variable
    }).fail( function() {                       // If a problem: show message
      $('#writing-tips').html('Sorry! We could not load the timetable at the moment');
    });
  }

  loadStuff();                              // Call the function


  // CLICK ON THE EVENT TO LOAD A TIMETABLE 
 $('.new-post').on('click', 'a .icon-help-circled', function(e) {  // User clicks on event

    e.preventDefault();                                // Prevent loading page
    var loc = this.id;           				       // Get value of id attr

    var newContent = '';                               // Build up timetable by
    for (var i = 0; i < times[loc]; i++) {      // looping through events
      newContent += '<li><span class="time">' + times[loc][i].time + '</span>';
      newContent += times[loc][i].title.replace(/ /g, '-') + '">';
      newContent += times[loc][i].title + '</a></li>';
    }

    $('#writing-tips').html('<ul>' + newContent + '</ul>'); // Display times on page

                         // Clear third column
  });

});