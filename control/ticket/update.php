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
        header('Location: /pending/ticket ');
    }
    
    function close($id){
        $close_ticket = "UPDATE ticket SET status='closed' WHERE id='$id'"; 
        mysqli_query(conn(), $close_ticket);
        header('Location: /closed/ticket ');
    }
    

    function content(){

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