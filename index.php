<?php
/********************************************************************************************
 *                        Author: Abdulbasit Rubeiyya                                       *
 *                         This is a noFra Framework                                        *
 ********************************************************************************************/


// Define global namespaces
use Core\Route;

// include global requisities
include 'Core/Route.php';

// Define global & core basepaths
define('BASEPATH',  '/');
define('CONFIG',    'Core/conf.php');
define('REQUIRED',	'Core/required.php');
define('SESSION',	'Core/session.php');
define('ROUTES',	'Core/routes.php');

// Define global innerpathes
define('_CONTROL',  'control');
define('_VIEW',     'panel');

// Define views & global layout
define('_LAYOUT',   _VIEW.'/layout');
define('_SUPER',	_VIEW.'/admin');		// admins layout	   - 1
define('_CLIENT',   _VIEW.'/client');		// client layout	   - 6
define('_ERROR',    _VIEW.'/errors');		// errors layout
define('_BRANCH',	_VIEW.'/branch');		// branch layout	   - 2
define('_DEPT', 	_VIEW.'/department');	// department layout   - 3
define('_STAFF',	_VIEW.'/agent');		// staff layout		   - 4
define('_ORGZ',		_VIEW.'/oranization');  // organization layour - 5

// Define global controllers
define('Auth',		 _CONTROL.'/auth');
define('Branch',	 _CONTROL.'/branch');
define('Chat', 		 _CONTROL.'/chat');
define('Department', _CONTROL.'/department');
define('Mail',		 _CONTROL.'/mail');
define('Notifier',	 _CONTROL.'/notification');
define('Organiztn',	 _CONTROL.'/organization');
define('Ticket',	 _CONTROL.'/ticket');
define('User',		 _CONTROL.'/user');

// Define global innertPath for view
define('Front',		_VIEW.'/web');

//Define global preRequisities
require_once(REQUIRED);

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


/************************************************
 * 	   EVERYTHING THAT HAS TO DO WITH TICKETS	*
 ************************************************/

Route::add('/open/ticket', function(){
  $get_open_ticket = new NavigateTicket;
  $get_open_ticket ->url_openTicket();
});

Route::add('/pending/ticket', function(){
	$get_active_ticket = new NavigateTicket;
	$get_active_ticket ->url_activeTicket();
});

Route::add('/closed/ticket', function(){
	$get_closed_ticket = new NavigateTicket;
	$get_closed_ticket ->url_closedTicket();
});

//view a specific ticket
Route::add('/view/ticket.*', function(){
	$view_this_ticket = new NavigateTicket;
	$view_this_ticket ->url_viewTicket();
});

Route::add('/reply/ticket.*', function(){
	$reply_ticket = new Conversation;
	$reply_ticket ->send(ID, $_POST['ticket'], $_POST['message']);
}, ['get','post']);

// Reopen a closed Ticket Route
Route::add('/open/ticket.*', function(){
	$activate_ticket = new NavigateTicket;
	$activate_ticket ->url_activateTicket();
});

// Close an Open Ticket Route
Route::add('/close/ticket.*', function(){
	$close_ticket = new NavigateTicket;
	$close_ticket ->url_closeTicket();
});

Route::add('/assign/ticket', function(){
	$assign_ticket = new NavigateTicket;
	$assign_ticket ->url_assignTicket();
}, ['get','post']);

Route::add('/create-ticket', function(){
	$department = $_POST['department'];
	$urgency    = $_POST['urgency'];
	$subject    = $_POST['subject'];
	$message    = $_POST['message'];

	$create_ticket = new Ticket();
	$create_ticket -> create_tickets(ID, BRANCH, ORG, $department, $urgency, $subject, $message);
}, ['get','post']);


/************************************************
 * EVERYTHING THAT HAS TO DO WITH AUTHORIZATION	*
 ************************************************/
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
				
				$username 		= strtolower($_POST['user']);
				$email			= $_POST['email'];
				$phone			= $_POST['phone'];
				$password		= $_POST['pass'];
				$branch			= $_POST['branch'];	
				$organization 	= $_POST['organization'];
				$organization	= Organization::find_org_id($organization);			
				$create_user->register_user($username, $email, $phone, $password, $branch, $organization);
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


/************************************************
 *  EVERYTHING THAT HAS TO DO WITH DEPARTMENTS	*
 ************************************************/
Route::add('/list/department', function(){
	include(_SUPER.'/department-list.php');
});

Route::add('/add/department', function(){
	include(_SUPER.'/department-create.php');
});

Route::add('/create/department', function(){
	include(Department.'/create.php');
}, ['get','post']);

//Branch management and navigation
Route::add('/list/branch', function(){
	include(_SUPER.'/branch-list.php');
});

Route::add('/add/branch', function(){
	include(_SUPER.'/branch-create.php');
});

Route::add('/create/branch', function(){
	include(Branch.'/create.php');
}, ['get','post']);


//------------APIs and Webhooks----------------//
Route::add('/search/oranization', function(){
	Organization::search();
}, ['get', 'post']);

Route::add('/api/chat/ticket.*', function(){
	include(_LAYOUT.'/chat-ticket.php');
});

Route::add('/imap', function(){
	include(_CONTROL.'/imap/imap.php');
});


Route::add('/smpp', function(){
	include('test.php');
});

Route::add('/test', function(){
	$sql = "SELECT * FROM organization WHERE name LIKE 'a%'";
    $sql = mysqli_query(conn(), $sql);
    $sql = mysqli_fetch_all($sql, MYSQLI_ASSOC);

	echo "<pre>";
	if(!empty($sql)){
		foreach($sql as $org){
			print_r($org);
		}
	}else{
		echo "nothing found";
	}
	echo "</pre>";
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
    echo '<li>'.$route['expression'].' ('.print_r($route['method']).')</li>';
  }
  echo '</ul>';
});

// Run the Router with the given Basepath
Route::run(BASEPATH);

// Enable case sensitive mode, trailing slashes and multi match mode by setting the params to true
// Route::run(BASEPATH, true, true, true);
