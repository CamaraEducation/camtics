<?php
/********************************************************************************************
 *                        Author: Abdulbasit Rubeiyya                                       *
 *                         This is a noFra Framework                                        *
 ********************************************************************************************/


// Use this namespace
use Core\Route;

// Include router class
include 'Core/Route.php';

// Define a global basepaths
define('BASEPATH',  '/');
define('CONFIG',    'Core/conf.php');
define('SESSION',	'Core/session.php');
define('ROUTES',	'Core/routes.php');
define('_CONTROL',  'control');
define('_VIEW',     'panel');

// Define view & global layout
define('_LAYOUT',   _VIEW.'/layout');
define('_SUPER',	_VIEW.'/admin');
define('_CLIENT',   _VIEW.'/client');
define('_ERROR',    _VIEW.'/errors');

// Define global controllers
define('Branch',	_CONTROL.'/branch');
define('Ticket',	_CONTROL.'/ticket');
define('Auth',		_CONTROL.'/auth');

// Define global innertPath for view
define('Front',		_VIEW.'/web');

//Define global preRequisities
require_once(CONFIG);
require_once(SESSION);
require_once(ROUTES);

// If your script lives in a subfolder you can use the following example
// Do not forget to edit the basepath in .htaccess if you are on apache
// define('BASEPATH','/api/v1');

// The startPages
Route::add('/', function() {
  $gethome =  new Home;
  $gethome -> url_index();
});

Route::add('/index.*', function() {
  include('panel/client/index.php');
});

Route::add('/all/ticket', function(){
  //if conditions with sessions
  include(_CLIENT.'/ticket-all.php');
});

Route::add('/open/ticket', function(){
  //if conditions with sessions
  include(_CLIENT.'/ticket-open.php');
});

Route::add('/pending/ticket', function(){
  //if conditions with sessions
  include(_CLIENT.'/ticket-pending.php');
});

Route::add('/closed/ticket', function(){
  //if conditions with sessions
  include(_CLIENT.'/ticket-closed.php');
});

Route::add('/create-ticket', function(){
	include(Ticket.'/ticket.php');

	$department = $_POST['department'];
	$urgency    = $_POST['urgency'];
	$subject    = $_POST['subject'];
	$message    = $_POST['message'];
	$file       = $_POST['file'];

	$create_ticket = new Ticket();
	$create_ticket -> create_tickets($department, $urgency, $subject, $message);
}, ['get','post']);

//define authorization routes
Route::add('/register', function()
{
	include(Front.'/signup.php');
});

Route::add('/login', function()
{
	include(Front.'/login.php');
});

// Get and Post route example
Route::add('/authorize', function() {
		$action = $_POST['action'];

		switch($action){
			case 'register':
				include(Auth.'/register.php');

				$username 	= $_POST['user'];
				$email		= $_POST['email'];
				$phone		= $_POST['phone'];
				$password	= $_POST['pass'];
				$branch		= $_POST['branch'];				
				$create_user->register_user($username, $email, $phone, $password, $branch);
			break;
			case 'login':
				include(Auth.'/login.php');

				$username = strtolower($_POST['user']);
				$password = md5($_POST['pass']);

				$loger = new Login;
				$loger -> loger($username, $password);
			break;
			case 'reset':
				//reset set
			default:
				echo 'could not find suitable action';
		}
}, ['get','post']);

Route::add('/logout', function(){
	$logout = new Home;
	$logout->logout();
});

Route::add('/mail', function(){
	echo LOGED;
});

// Add a 404 not found route
Route::pathNotFound(function($path) {
  // Do not forget to send a status header back to the client
  // The router will not send any headers by default
  // So you will have the full flexibility to handle this case
  header('HTTP/1.0 404 Not Found');
  include(_ERROR.'/404.html');
});

// Add a 405 method not allowed route
Route::methodNotAllowed(function($path, $method) {
  // Do not forget to send a status header back to the client
  // The router will not send any headers by default
  // So you will have the full flexibility to handle this case
  header('HTTP/1.0 405 Method Not Allowed');  
  include(_ERROR.'/405.html');
});

// Return all known routes
Route::add('/known-routes', function() {
  
  $routes = Route::getAll();
  echo '<ul>';
  foreach($routes as $route) {
    echo '<li>'.$route['expression'].' ('.$route['method'].')</li>';
  }
  echo '</ul>';
});

// Run the Router with the given Basepath
Route::run(BASEPATH);

// Enable case sensitive mode, trailing slashes and multi match mode by setting the params to true
// Route::run(BASEPATH, true, true, true);
