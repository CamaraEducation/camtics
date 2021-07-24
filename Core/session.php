<?php
if (!empty($_SESSION)){
    define('id',    $_SESSION['id']);
    define('user',	$_SESSION['username']);
    define('name',  $_SESSION['fname'].$_SESSION['lname']);
    define('phone', $_SESSION['code'].$_SESSION['phone']);
	define('org',	$_SESSION['organization']);
	define('branch',$_SESSION['branch']);
	define('',		$_SESSION['']);
	define('',		$_SESSION['']);

}

?>