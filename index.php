<?php
/********************************************************************************************
 *                        Author: Abdulbasit Rubeiyya                                       *
 *                         This is a noFra Framework                                        *
 ********************************************************************************************/


// Define global namespaces
use Core\Route;
use PhpImap\Imap;

// include global requisities
include 'Core/Route.php';
include 'vendor/autoload.php';

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
define('_PROFILE',	_VIEW.'/profile');

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
	NavigateTicket::url_openTicket();
});

Route::add('/pending/ticket', function(){
	NavigateTicket::url_activeTicket();
});

Route::add('/closed/ticket', function(){
	NavigateTicket::url_closedTicket();
});

//view a specific ticket
Route::add('/view/ticket/([0-9]*)', function(){
	NavigateTicket::url_viewTicket();
});

Route::add('/reply/ticket', function(){
	Conversation::send(ID, $_POST['ticket'], $_POST['message']);
}, ['get','post']);

// Reopen a closed Ticket Route
Route::add('/open/ticket/([0-9]*)', function(){
	NavigateTicket::url_activateTicket();
});

// Close an Open Ticket Route
Route::add('/close/ticket/([0-9]*)', function(){
	NavigateTicket::url_closeTicket();
});

Route::add('/assign/ticket', function(){
	NavigateTicket::url_assignTicket();
}, 'post');

Route::add('/transfer/ticket', function(){
	NavigateTicket::url_assignTicket();
}, 'post');

Route::add('/create-ticket', function(){
	$department = $_POST['department'];
	$urgency    = $_POST['urgency'];
	$subject    = $_POST['subject'];
	$message    = $_POST['message'];

	$create_ticket = new Ticket();
	$create_ticket -> create_tickets(ID, BRANCH, ORG, $department, $urgency, $subject, $message);
}, ['get','post']);

/************************************************
 * 		EVERYTHING THAT HAS TO DO WITH USERS	*
 ************************************************/
Route::add('/list/user', function(){
	NavigateUser::url_listUser();
});

Route::add('/profile', function(){
	NavigateUser::url_account();
});

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
			case 'register': include(Auth.'/register.php');	
				$username 		= strtolower($_POST['user']);
				$email			= $_POST['email'];
				$phone			= $_POST['phone'];
				$password		= $_POST['pass'];
				$branch			= $_POST['branch'];	
				$organization 	= $_POST['organization'];
				$organization	= Organization::find_org_id($organization);			
				$create_user->register_user($username, $email, $phone, $password, $branch, $organization);
			break;

			case 'login': include(Auth.'/login.php');
				$username = strtolower($_POST['user']);
				$password = md5($_POST['pass']);
				$loger = new Login;
				$loger -> loger($username, $password);
			break;
			case 'reset':
				//reset set
			default:
				echo 'method used is not allowed';
		}
}, ['get','post']);

Route::add('/logout', function(){
	Home::logout();
});


/************************************************
 *			DEPARTMENTS AND BRANCHES			*
 ************************************************/
Route::add('/branch/setting', function(){
	NavigateBranch::url_branchSetting();
});

Route::add('/branch/([0-9]*)/setting', function($id) {
	switch(ROLE){
		case 1: NavigateBranch::url_branchSetting(); break;
		default :
			Home::url_dashboard();
	}
});

Route::add('/create/branch', function(){
	include(Branch.'/create.php');
}, 'post');

Route::add('/list/department', function(){
	NavigateDepartment::url_listDepartment();
});

Route::add('/add/department', function(){
	NavigateDepartment::url_addDepartmet();
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


/************************************
 *		MAILS AND NOTIFICATION		*
 ************************************/
Route::add('/incoming/mails', function(){
	NavigateMail::url_incomingMails();
});

//------------APIs and Webhooks----------------//
Route::add('/search/oranization', function(){
	Organization::search();
}, ['get', 'post']);

Route::add('/api/chat/ticket.*', function(){
	include(_LAYOUT.'/chat-ticket.php');
});

Route::add('/smpp', function(){
	include('test.php');
});

Route::add('/test', function(){
	echo '<pre>';
	print_r(ImapClient::get_message());
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
