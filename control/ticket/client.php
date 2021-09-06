<?php
/************************************************************************
 *                      Tickets management for Client                   *
 *                                                                      *
 ************************************************************************/
class ClientTicket extends Ticket{
    function count_ticket($user){
        $count_ticket = "SELECT status as name, COUNT(id) as value FROM ticket WHERE sender='$user' GROUP BY status;";
        $count_ticket = mysqli_query(conn(), $count_ticket);
        $rows         = array('open'=>0, 'active'=>0, 'closed'=>0);

        while($row = mysqli_fetch_assoc($count_ticket)){
            $rows[$row['name']] = $row['value'];
        }

        return $rows;
    }

    function open_ticket($user){
        $open_ticket = "SELECT id, department, agent, subject, SUBSTRING(content, 1, 25) as message, time FROM ticket WHERE sender='$user' AND status='open'";
        $open_ticket = mysqli_query(conn(), $open_ticket);
		$num_tickets = mysqli_num_rows($open_ticket);
		
        //oversee the implementation of from end
		if($num_tickets>0){
			return $open_ticket = mysqli_fetch_all($open_ticket, MYSQLI_ASSOC);
		}else{
			return $open_ticket = array('1'=> 
            array(
                'id'        => 'NA',
                'department'=> 'NA',
                'agent'     => 'NA',
                'subject'   => 'NA',
                'message'   => 'NA',
                'time'      => 'NA'
            ));
		}
    }

    function closed_ticket($user){
        $open_ticket = "SELECT id, department, agent, subject, SUBSTRING(content, 1, 25) as message, time FROM ticket WHERE sender='$user' AND status='closed'";
        $open_ticket = mysqli_query(conn(), $open_ticket);
		$num_tickets = mysqli_num_rows($open_ticket);
		
        //oversee the implementation of from end
		if($num_tickets>0){
			return $open_ticket = mysqli_fetch_all($open_ticket, MYSQLI_ASSOC);
		}else{
			return $open_ticket = array('1'=> 
            array(
                'id'        => 'NA',
                'department'=> 'NA',
                'agent'     => 'NA',
                'subject'   => 'NA',
                'message'   => 'NA',
                'time'      => 'NA'
            ));
		}
    }

    function active_ticket($user){
        $open_ticket = "SELECT id, department, agent, subject, SUBSTRING(content, 1, 25) as message, time FROM ticket WHERE sender='$user' AND status='active'";
        $open_ticket = mysqli_query(conn(), $open_ticket);
		$num_tickets = mysqli_num_rows($open_ticket);
		
        //oversee the implementation of from end
		if($num_tickets>0){
			return $open_ticket = mysqli_fetch_all($open_ticket, MYSQLI_ASSOC);
		}else{
			return $open_ticket = array('1'=> 
            array(
                'id'        => 'NA',
                'department'=> 'NA',
                'agent'     => 'NA',
                'subject'   => 'NA',
                'message'   => 'NA',
                'time'      => 'NA'
            ));
		}
    }
}
?>