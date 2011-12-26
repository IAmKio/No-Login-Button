/*
* Written by Kieran Goodary, 2011
* Website: http://nologinbutton.com
* Feel free to modify and distribute this.
*/

(function( $ ){

  $.fn.nologinbutton = function( options ) {  

	keypress_count = 0;
	millisecond_count = 0;
	wait_time = 0;
	startTimer = null;
	loginTimer = null;

    var settings = $.extend({
      'username_id'   : 'username',
      'password_id'   : 'password',
	  'POST_to'	      : window.location.href,
	  'logged_in_url' : window.location.href,
	  'activity'	  : 'activity',
	  'fade_out_login': 0
    }, options);

	var countSeconds = function() {
      millisecond_count++; 
    }

    var login = function() {
	
		$("#"+settings.activity).fadeIn('fast');
		$.ajax({
		  type: "POST",
		  url: settings.POST_to,
		  data: "u="+$("#"+settings.username_id).val()+"&p="+$("#"+settings.password_id).val(),
		}).done(function(msg) {
		  if (msg) {
		    if (settings.fade_out_login == 0) {
				  window.location=settings.logged_in_url;
			} else {
				$("#container").fadeOut(function() {
			      window.location=settings.logged_in_url;
			  	});				
			}
		} else {
		  $("#"+settings.activity).fadeOut();
		}
		});
    }
		
	$(this).keypress(function() {

		keypress_count++;
	
		if (millisecond_count == 0 ) {
			startTimer = setInterval(countSeconds,1);
		}
	
		if (keypress_count > 1) {

			clearInterval(startTimer);
			wait_time = millisecond_count * 5;
		
			clearTimeout(loginTimer);
			loginTimer = setTimeout(login, wait_time);
		
		}

	});	

  };
})( jQuery );