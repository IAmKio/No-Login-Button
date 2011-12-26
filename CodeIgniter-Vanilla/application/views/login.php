<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>No Login Button - Demo</title>
	
	<script type="text/javascript" src="<?=base_url()?>resources/js/jquery.js"></script>

	<link rel='stylesheet' type='text/css' media='all' href='<?=base_url()?>resources/css/common.css' />
	
	<script type="text/javascript">
	
	// Let's set up some global variables to use throughout
	// this technique.
	
	// Throughout the code below, you will notice various console.log statements.
	// Please uncomment these should you wish to view timing events etc that are captured.
	
	keypress_count = 0;
	millisecond_count = 0;
	wait_time = 0;
	startTimer = null;
	loginTimer = null;
	
	function countSeconds() {
		
		// Simply counting the amount of milliseconds between 
		// keystroke 1 and keystroke 2. This will be used 
		// throughout the auto-login technique.
		
		millisecond_count++;
		
	}
	
	function login() {
		
		// Now we're going to run the login process.
		// This doesn't have to be an ajax check, if you wish, 
		// you can simply submit the form here. We have still 
		// eliminated the need for the login button.
		
		// console.log('Lets do it!');
		
		// Give the user at least a tiny bit of feedback...
		// But please, be careful not to over-do the "activity" display
		// whilst the user waits for their credentials to be checked.
		// Keep it simple, discreet, and beautiful.
		
		$("#activity").fadeIn('fast');
		
		// Consider using HTTPS here...
		
		$.ajax({
		  type: "POST",
		  url: "<?=base_url()?>index.php/login/check",
		  data: "u="+$("#username").val()+"&p="+$("#password").val(),
		}).done(function(msg) {
		  if (msg) {
			$("#container").fadeOut(function() {
			  window.location="<?=base_url()?>index.php?/login/result";
			});
		  } else {
			$("#activity").fadeOut();
		}
		});
		
	}
	
	$(document).ready(function() {
		
		// When the document is ready, of course...
		
		$("#login_form").keypress(function() {
			
			// For every keypress, we want to keep counting how many
			// times the keys were pressed. We're starting out at 0, 
			// and incrementing for every key press.

			keypress_count++;
			
			// We're going to start counting the milliseconds now right 
			// after the first keypress hit (as long as the millisecond 
			// count is 0...)
			
			if (millisecond_count == 0 ) {
				startTimer = setInterval("countSeconds()",1);
			}
			
			if (keypress_count > 1) {
				
				// OK so now we've had our second keystroke! We've now figured out
				// how long it took the user to type from keystroke 1, and then 
				// keystroke 2. We're now going to calculate how long we should 
				// "wait" before we actually perform the login function.
				
				// Oh yeah, let's stop the timer!
				clearInterval(startTimer);
				
				// console.log("Millisecond Count: " + millisecond_count);
				
				// We're now calculating the "wait time". I've played around with 
				// this, and figured that multiplying the time between keystroke 1 
				// and keystroke 2 by 5 provided enough time for the user to finish
				// typing.
				
				wait_time = millisecond_count * 5;
				
				// console.log("Wait time: " + wait_time);
				
				// It's showtime!!! We have now started the countdown to log the user 
				// in based on "wait time". Clear any loginTimer if it is running already
				// as the user may start typing again during the "wait time", and for 
				// every keystroke - we want to start the timer again.
				
				clearTimeout(loginTimer);
				loginTimer = setTimeout("login()", wait_time);
				
			}

		});	
		
	});
	
	</script>

</head>
<body>

<div id="container">
	<h1>No Login Button - Log In</h1>

	<div id="body">
		
		<p>Thanks for creating the example username, password and your desired value.</p>
		<p>This login form below does not contain a login button!</p>
		<p>All you need to do is enter your username and password that you specified on 
			the previous page.</p>

		<form id="login_form" action="<?=base_url()?>index.php?/login/manual_login" method="post">
			
			<label for="username">Username:</label> 
			<input type="text" id="username" name="username" autocomplete="off" required placeholder="Your Username" />
			
			<label for="password">Password:</label> 
			<input type="password" id="password" name="password" autocomplete="off" required placeholder="Your Password" />
			
			<img id="activity" src="<?=base_url()?>resources/img/load.gif" style="display: none;" />
			
			<noscript><input type="submit" value="Log in" /></noscript>
			
		</form>

	</div>
	
</div>

</body>
</html>