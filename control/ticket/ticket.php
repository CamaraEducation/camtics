<?php
class Ticket{
    function create_tickets($department, $urgency, $subject, $content){
        $create_ticket = "INSERT INTO `ticket` (`sender`, `branch`, `department`, `urgency`, `subject`, `content`)
                          VALUES ('1', '1', '$department', '$urgency', '$subject', '$content')";
        
        if(mysqli_query(conn(), $create_ticket)){
			echo "<script type=\"text/javascript\">
						alert(\"SUCCESS: Ticket has been succesfully opened.\");
						window.location.pathname = \"/\"
				</script>";
		}else{
			echo "<script type=\"text/javascript\">
						alert(\"ERROR: Ticket could not be opened. Please try again\");
						window.location.pathname = \"/\"
				</script>";
		}
    }

    function specif_ticket(){

    }

    function department_tickets(){

    }

    function branch_tickets(){

    }

    function all_tickets(){

    }

    function count_tickets(){
        $count_ticket = "SELECT status as name, COUNT(id) as value FROM ticket GROUP BY status;";
        $count_ticket = mysqli_query(conn(), $count_ticket);
        $rows         = array('open'=>0, 'active'=>0, 'closed'=>0);

        while($row = mysqli_fetch_assoc($count_ticket)){
            $rows[$row['name']] = $row['value'];
        }

        return $rows;
    }
}


class UpdateTicket extends Ticket{
    function escalate(){

    }

    function status(){
        
    }

    function content(){

    }

    function assign(){

    }
}

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
        $open_ticket = "SELECT * FROM ticket WHERE sender='$user'";
        $open_ticket = mysqli_query(conn(), $open_ticket);
		$num_tickets = mysqli_num_rows($open_ticket);
		
		if($num_tickets>0){
			return $open_ticket = mysqli_fetch_all($open_ticket, MYSQLI_ASSOC);
		}else{
			//
		}
    }
}

$count_ticket   = new ClientTicket();
$count_tickets  = new Ticket;

?>