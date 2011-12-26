No Login Button Read Me
=============

*First of all, i want to thank you for even getting this far to begin with! Hopefully, using the power of collaboration and open source, we can engineer this technique into production examples!*

I've included some basic instructions here just to get you started.

In this repository, there are three sub-projects of the No Login Button project:

* CodeIgniter, a vanilla install with some grafted in functions for No Login Button in the controller and some view files.
* CodeIgniter with Tank Auth, a popular authentication library, which has had an extra function added to the "auth" controller to facilitate the implementation of the No Login Button technique.
* jQuery, a minified and non-minified plugin for those that would like a jumpstart.

Both the CodeIgniter sub-projects have db_schema.sql files contained within them that you need to import into your MySQL database, and don't forget to add you're database connection details to the database.php configuration file in the applications/config folder.

jQuery No Login Button plugin documentation
=============

I have tried to make the plugin as simple, but as adaptable as possible. Before we continue, these are the the available options that you can pass to the jQuery plugin:

* (optional: assumes "username") username_id - specify the ID of the username text field element
* (optional: assumes "password") password_id - specify the ID of the password field element
* (optional: assumes window.self) POST_to - specify where the Ajax request with the username and password should be POSTed to be checked
* (optional: assumes window.self) logged_in_url - if the server returns a message, preferably "1", this indicates that the username and password were correct and a session was created. Now where does the browser go? Specify it here.
* (optional: assumes "activity") activity - specify the ID of a small, unobtrusive, light 'loading' icon or text. As checks are being made against the server, the plugin will fade in and out the element ID that you specify here. This is useful for slow connections, and provides feedback for users unfamiliar with this technique.
* (optional: set at 0) fade_out_login - this will simply fade out the login box when the credentials are correct before directing the browser to logged_in_page. Use 1 for the fade out animation, 0 for no fade out animation. This looks nice for sites that use a whole page for a login box (see: http://demo.nologinbutton.com).

As you probably noticed, you don't have to specify any of the parameters above... but the chances are that the plugin will not integrate very well out the box. You *probably will* have to add a few parameters to get it working.

So, let's go straight into it - the basic implementation is as follows:

<pre>
	$('#formIDhere').nologinbutton();
</pre>

It will happily assume all the options and do its job whether the options are correct or not. Here is another example with all the options pimped out:

<pre>
	$('#formIDhere').nologinbutton({
		'username_id'   : 'username_box',
	    'password_id'   : 'password_box',
		'POST_to'	    : 'auth/check.php',
		'logged_in_url' : 'control_panel.php',
		'activity'	    : 'load_icon',
		'fade_out_login': 1
	});
</pre>

As you can see in the example above: the ID of the username field is "username_box", the ID of the password field is "password_box", the credentials are sent to "auth/check.php" to be checked by the server, if the credentials are correct - the browser is redirected to "control_panel.php", the ID of the activity element is set to "load_icon" whilst the credentials are being checked and before the page redirects to logged_in_url, the login box will fade out.

There is a massively important point to remember here! When the credentials are sent to the server, the POST array that contains the username and password to be checked are "u" and "p"; "u" will contain the username, and "p" will contain the password.

<pre>
	$username = $_POST['u'];
	$password = $_POST['p'];
</pre>

Go forth an fork. I need the help of the developer community to make this a reality! I dream of a world with No Login Buttons! If you're considering forking or implementing this technique - thank you!!! :)

There's no progress without change. Let's remove this psychological dependance on the login button in HTML forms!