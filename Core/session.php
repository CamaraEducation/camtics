<?php
//This page defines the session global constants
session_start();
if (!empty($_SESSION)){
    define('ID',     $_SESSION['id']);
    define('USER',	 $_SESSION['username']);
    define('NAME',   $_SESSION['fname'].$_SESSION['lname']);
    define('PHONE',  $_SESSION['phone']);
	define('ORG',	 $_SESSION['organization']);
	define('BRANCH', $_SESSION['branch']);
	define('EMAIL',	 $_SESSION['email']);
	define('PHOTO',	 $_SESSION['photo']);
	define('NIN',	 $_SESSION['nin']);
	define('ROLE',	 $_SESSION['role']);
	define('STATUS', $_SESSION['status']);
	define('LOGED',  'active');
}else{
	define('ID',     0);
    define('USER',	 0);
    define('NAME',   0);
    define('PHONE',  0);
	define('ORG',	 0);
	define('BRANCH', 0);
	define('EMAIL',	 0);
	define('PHOTO',	 0);
	define('NIN',	 0);
	define('ROLE',	 0);
	define('STATUS', 0);
	define('LOGED',  'nil');
}

?>