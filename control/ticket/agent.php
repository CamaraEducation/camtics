<?php 
/************************************************************************
 *                      Tickets management for Agents                   *
 *                                                                      *
 ************************************************************************/
class StaffTicket extends Ticket{
    function ass_open_tickets($user){
        $open_ticket = "SELECT id, subject, DATEDIFF(CURRENT_TIMESTAMP, t.`update`) AS `update` SUBSTRING(content, 1, 25) as message, time FROM ticket WHERE agent='$user' AND status='open'";
        $open_ticket = mysqli_query(conn(), $open_ticket);
		$num_tickets = mysqli_num_rows($open_ticket);
		
        //oversee the implementation of from end
		if($num_tickets>0){
			return $open_ticket = mysqli_fetch_all($open_ticket, MYSQLI_ASSOC);
		}else{
			return $open_ticket = array('1'=> 
            array(
                'id'        => 'NA',
                'subject'   => 'NA',
                'message'   => 'NA',
                'update'      => 'NA'
            ));
		}
    }

    function ass_closed_tickets($user){
        $open_ticket = "SELECT id, department, agent, subject, SUBSTRING(content, 1, 25) as message, time FROM ticket WHERE agent='$user' AND status='closed'";
        $open_ticket = mysqli_query(conn(), $open_ticket);
		$num_tickets = mysqli_num_rows($open_ticket);
		
        //oversee the implementation of from end
		if($num_tickets>0){
			return $open_ticket = mysqli_fetch_all($open_ticket, MYSQLI_ASSOC);
		}else{
			return $open_ticket = array('1'=> 
            array(
                'id'        => 'NA',
                'subject'   => 'NA',
                'message'   => 'NA',
                'update'    => 'NA'
            ));
		}
    }

    function ass_active_tickets($user){
        $open_ticket = "SELECT id, subject, SUBSTRING(content, 1, 25) as message, time FROM ticket WHERE agent='$user' AND status='active'";
        $open_ticket = mysqli_query(conn(), $open_ticket);
		$num_tickets = mysqli_num_rows($open_ticket);
		
        //oversee the implementation of from end
		if($num_tickets>0){
			return $open_ticket = mysqli_fetch_all($open_ticket, MYSQLI_ASSOC);
		}else{
			return $open_ticket = array('1'=> 
            array(
                'id'        => 'NA',
                'subject'   => 'NA',
                'message'   => 'NA',
                'update'      => 'NA'
            ));
		}
    }    
}
?>