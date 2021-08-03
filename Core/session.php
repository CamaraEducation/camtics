<?php
if (!empty($_SESSION)){
    define('ID',    $_SESSION['id']);
    define('USER',	$_SESSION['username']);
    define('NAME',  $_SESSION['fname'].$_SESSION['lname']);
    define('PHONE', $_SESSION['code'].$_SESSION['phone']);
	define('ORG',	$_SESSION['organization']);
	define('BRANCH',$_SESSION['branch']);
	//define('',		$_SESSION['']);
	//define('',		$_SESSION['']);
}

?>