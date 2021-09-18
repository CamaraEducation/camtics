<?php
/************************************************************************
 *                      Ticket alteration class                         *
 *                                                                      *
 ************************************************************************/
class UpdateTicket extends Ticket{
	function escalate(){

	}

	public static function activate($id){
		$reopen_ticket = "UPDATE ticket SET status='active' WHERE id='$id'";
		mysqli_query(conn(), $reopen_ticket);
		Ticket::update_ticket($id);
		Notification::ticket_status('ACTIVATED', $id);
	}
	
	function close($id){
		$close_ticket = "UPDATE ticket SET status='closed' WHERE id='$id'"; 
		mysqli_query(conn(), $close_ticket);
		Ticket::update_ticket($id);
		Notification::ticket_status('CLOSED', $id);
	}

	public static function assign($agent, $ticket){
		$assign_ticket = "UPDATE ticket SET agent='$agent' WHERE id='$ticket'";
		if(mysqli_query(conn(), $assign_ticket)){
			UpdateTicket::activate($ticket);
			echo json_encode(array("statusCode"=>200));
		}else{
			echo json_encode(array("statusCode"=>201));
		}
	}

	public static function transfer($department, $ticket){
		$transfer_ticket = "UPDATE ticket SET department='$department' WHERE id='$ticket'";
		if(mysqli_query(conn(), $transfer_ticket)){
			echo json_encode(array("statusCode"=>200));
		}else{
			echo json_encode(array("statusCode"=>201));
		}
	}
}
?>