<?php
class Home{
	public static function url_index(){
		if(LOGED!=='active'){
			include Front.'/login.php';
		}else{
			Home::url_dashboard();
		}
	}

	//Define the dashboard location for appropriate user
	public static function url_dashboard(){
		switch(ROLE){
			case 6: include _CLIENT	.'/index.php'; break;
			case 1: include _SUPER	.'/index.php'; break;
			case 2: include _BRANCH	.'/index.php'; break;
			case 3: include _DEPT	.'/index.php'; break;
			case 4: include _STAFF	.'/index.php'; break;
			case 5:
				echo "Head of Organization"; break;
			default: Home::logout();
		}
	}

	public static function logout(){
		session_destroy();
		include Front.'/login.php';
	}
}

//route definition for Ticket related routes
class NavigateTicket extends Home{
	//route to access open tickets
	public static function url_openTicket(){
		switch(ROLE){
			case 6: include _CLIENT	.'/ticket-open.php'; break;
			case 1: include _SUPER	.'/ticket-open.php'; break;
			case 2: include _BRANCH	.'/ticket-open.php'; break;
			case 3: include _DEPT	.'/ticket-open.php'; break;
			case 4: include _STAFF	.'/ticket-open.php'; break;
			case 5:
				break;
			default: Home::logout();
		}
	}

	//route to  access active/pending tickets
	public static function url_activeTicket(){
		switch(ROLE){
			case 6: include _CLIENT	.'/ticket-pending.php'; break;
			case 1: include _SUPER	.'/ticket-pending.php'; break;
			case 2: include _BRANCH	.'/ticket-pending.php'; break;
			case 3: include _DEPT	.'/ticket-pending.php'; break;
			case 4: include _STAFF	.'/ticket-pending.php'; break;
			case 5:
				break;
			default: Home::logout();
		}
	}

	//route to  access closed tickets
	public static function url_closedTicket(){
		switch(ROLE){
			case 6: include _CLIENT .'/ticket-closed.php'; break;
			case 1: include _SUPER  .'/ticket-closed.php'; break;
			case 2: include _BRANCH .'/ticket-closed.php'; break;
			case 3: include _DEPT   .'/ticket-closed.php'; break;
			case 4: include _STAFF  .'/ticket-closed.php'; break;
			case 5: break;
			default: Home::logout();
		}
	}

	public static function url_viewTicket(){
		switch(ROLE){
			case 6: include _CLIENT	.'/ticket-view.php'; break;
			case 1: include _SUPER	.'/ticket-view.php'; break;
			case 2: include _BRANCH	.'/ticket-view.php'; break;
			case 3: include _DEPT	.'/ticket-view.php'; break;
			case 4: include _STAFF	.'/ticket-view.php'; break;
			case 5: break;
			default: Home::logout();
		}
	}

	public static function url_activateTicket(){
		if(ROLE>0){
			$ticket = substr(($_SERVER['REQUEST_URI']), 13);
			$reopen_ticket = new UpdateTicket;
			$reopen_ticket -> reopen($ticket);
		}else{
			Home::logout();
		}
	}

	public static function url_closeTicket(){
		if(ROLE>0){
			$ticket = substr(($_SERVER['REQUEST_URI']), 14);
			$close_ticket = new UpdateTicket;
			$close_ticket -> close($ticket);
		}else{
			Home::logout();
		}
	}

	public static function url_createTicket(){
		if(ROLE>0){
			$department = $_POST['department'];
			$urgency    = $_POST['urgency'];
			$subject    = $_POST['subject'];
			$message    = $_POST['message'];
		
			$create_ticket = new Ticket();
			$create_ticket -> create_tickets(ID, BRANCH, ORG, $department, $urgency, $subject, $message);
		}else{
			Home::logout();
		}
	}

	public static function url_assignTicket(){
		if(ROLE>0 and ROLE<5){
			UpdateTicket::assign($_POST['user'],$_POST['ticket']);
		}else{
			Home::logout();
		}
	}
}

class NavigateUser extends Home{
	public static function url_listUser(){
		switch(ROLE){
			case 1: include _SUPER	.'/users-list.php'; break;
			case 2: include _BRANCH	.'/users-list.php'; break;
			default : Home::logout();
		}        
	}

	public static function url_account(){
		if(ROLE>0 and ROLE<5){
			include _PROFILE.'/account.php';
		}else{
			Home::logout();
		}
	}
}

class NavigateDepartment extends Home{
	public static function url_listDepartment(){
		switch(ROLE){
			case 1: include _SUPER	.'/department-list.php'; break;
			case 2: include _BRANCH	.'/department-list.php'; break;
			default : Home::logout();
		}
	}

	public static function url_addDepartmet(){
		switch(ROLE){
			case 1: include _SUPER	.'/department-create.php'; break;
			case 2: include _BRANCH	.'/department-create.php'; break;
			default : Home::logout();
		}
	}
}

class NavigateMail extends Home{
	public static function url_incomingMails(){
		switch(ROLE){
			case 1: break;
			case 2: include _BRANCH	.'/email-list.php'; break;
			default : Home::logout();
		}
	}
}

class NavigateBranch extends Home{
	public static function url_branchSetting(){
		switch(ROLE){
			case 1: include _SUPER	.'/branch-conf.php'; break;
			case 2: include _BRANCH	.'/branch-conf.php'; break;
			default : Home::logout();
		}
	}
}

function getter(){
	return $extn = pathinfo($_SERVER['REQUEST_URI']);
}

/*
if(ROLE>0){

}else{

}
		switch(ROLE){
			case 0: break;
			case 1: break;
			case 2: break;
			case 3: break;
			case 4: break;
			case 5: break;
			default :
				Home::logout();
		}  
*/
?>