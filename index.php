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
define('_CONTROL',   'control');
define('_VIEW',     'panel');
define('_LAYOUT',   _VIEW.'/layout');
define('_CLIENT',   _VIEW.'/client');
define('_ERROR',    _VIEW.'/errors');

// If your script lives in a subfolder you can use the following example
// Do not forget to edit the basepath in .htaccess if you are on apache
// define('BASEPATH','/api/v1');

// The startPages
Route::add('/', function() {
  include('panel/client/index.php');
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
