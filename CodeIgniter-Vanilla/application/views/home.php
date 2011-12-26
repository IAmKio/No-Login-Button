<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>No Login Button - Demo</title>

	<link rel='stylesheet' type='text/css' media='all' href='<?=base_url()?>resources/css/common.css' />

	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-12504135-26']);
	  _gaq.push(['_setDomainName', '.nologinbutton.com']); 
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
</head>
<body>

<div id="container">
	<h1>No Login Button - Demo</h1>

	<div id="body">
		
		<p>To start this proof of concept demo, please create a username, password and 
			a value of your choice.</p>
			
		<p><strong>Please do not use ANY sensitive information here! This is just an 
			example and the credentials database is wiped every hour.</strong></p>
			
		<p>This is not a login form, and this page is also an example where this technique 
			should NOT be used as the user can spend an intermittent amount of time here.</p>

		<form action="<?=base_url()?>index.php?/login/create" method="post">
			
			<fieldset>
				<label for="username">Username:</label> 
				<input type="text" name="username" id="username" required placeholder="Any Username" />
			</fieldset>
		
			<fieldset>
				<label for="password">Password:</label> 
				<input type="password" name="password" id="password" required placeholder="Any Password" />
			</fieldset>
			
			<fieldset>
				<label for="value">Any Text:</label> 
				<input type="text" name="value" id="value" required placeholder="Any Text" />
			</fieldset>
			
			<input type="submit" value="Save &amp; Continue" />
			
		</form>

	</div>
	
</div>

</body>
</html>