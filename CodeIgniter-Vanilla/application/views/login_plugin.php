<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>No Login Button - Demo</title>
	
	<script type="text/javascript" src="<?=base_url()?>resources/js/jquery.js"></script>
	<script type="text/javascript" src="<?=base_url()?>resources/js/jquery.nologinbutton.js"></script>
	
	<link rel='stylesheet' type='text/css' media='all' href='<?=base_url()?>resources/css/common.css' />
	
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

<script type="text/javascript">

	$("#login_form").nologinbutton({
		POST_to: "<?=base_url()?>index.php/login/check",
		logged_in_url: "<?=base_url()?>index.php?/login/result"
	});

</script>

</html>