PHP 

	db_connect.php - for connecting to my website's database 
	blogcreate.inc.php - creates a blog post from submitted for data
	blogs.php - retrieves a list of blog posts from the server and returns JSON for the web-app
	comment_create.php - similar to blogcreate.inc.php but for comments
	comments.php - similar to blogs.php but for comments 
	blogedit-php - uses the update SQL command for updating information not creating new posts

HTML 

Stephanie's Website
	
	index.html - the main page 
	views - partials that replace the following line of code in index to change the content of the browser
		<div class="main-view-container" ui-view></div>

AngularJS

Javascript in the angular format 

	Stephanie's Website 
	
		Services
			Makes a request from the server's php scripts and uses a promise 