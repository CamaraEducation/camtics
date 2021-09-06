<?php
/************************************************************************
 *                      Ticket alteration class                         *
 *                                                                      *
 ************************************************************************/
class UpdateTicket extends Ticket{
    function escalate(){

    }

    function reopen($id){
        $reopen_ticket = "UPDATE ticket SET status='active' WHERE id='$id'";
        mysqli_query(conn(), $reopen_ticket);
        Ticket::update_ticket($id);
        Notification::ticket_status('ACTIVATED', $id);
        header('Location: /pending/ticket ');
    }
    
    function close($id){
        $close_ticket = "UPDATE ticket SET status='closed' WHERE id='$id'"; 
        mysqli_query(conn(), $close_ticket);
        Ticket::update_ticket($id);
        Notification::ticket_status('CLOSED', $id);
        header('Location: /closed/ticket ');
    }

    public static function assign($agent, $ticket){
        $assign_ticket = "UPDATE ticket SET agent='$agent' WHERE id='$ticket'";
        if(mysqli_query(conn(), $assign_ticket)){
			echo json_encode(array("statusCode"=>200));
		}else{
			echo json_encode(array("statusCode"=>201));
		}
    }
}
?>