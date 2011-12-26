No Login Button Read Me
=============

*First of all, i want to thank you for even getting this far to begin with! Hopefully, using the power of collaboration and open source, we can engineer this technique into production examples!*

I've included some basic instructions here just to get you started.

In this repository, there are three sub-projects of the No Login Button project:

* CodeIgniter, a vanilla install with some grafted in functions for No Login Button in the controller and some view files.
* CodeIgniter with Tank Auth, a popular authentication library, which has had an extra function added to the "auth" controller to facilitate the implementation of the No Login Button technique.
* jQuery, a minified and non-minified plugin for those that would like a jumpstart.

Both the CodeIgniter sub-projects have db_schema.sql files contained within them that you need to import into your MySQL database, and don't forget to add you're database connection details to the database.php configuration file in the applications/config folder.

There's no progress without change. Let's remove this psychological dependance on the login button in HTML forms!