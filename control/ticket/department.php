<?php
class DepartmentTicket extends Ticket{
    function department_open_tickets($department){
        $open_ticket = "SELECT id, subject, SUBSTRING(content, 1, 25) as message, DATEDIFF(CURRENT_TIMESTAMP, `update`) AS `update` FROM ticket WHERE department='$department' AND status='open'";
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

    function department_active_tickets($department){
        $open_ticket = "SELECT id, subject, SUBSTRING(content, 1, 25) as message, DATEDIFF(CURRENT_TIMESTAMP, `update`) AS `update` FROM ticket WHERE department='$department' AND status='active'";
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

    function department_closed_tickets($department){
        $open_ticket = "SELECT id, subject, SUBSTRING(content, 1, 25) as message, DATEDIFF(CURRENT_TIMESTAMP, `update`) AS `update` FROM ticket WHERE department='$department' AND status='closed'";
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