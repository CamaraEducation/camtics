<?php
define('BASEPATH',  '../../');
define('CONFIG',    BASEPATH.'Core/conf.php');
define('_CONTROL',  BASEPATH.'control');
define('_VIEW',     BASEPATH.'panel');
define('_LAYOUT',   _VIEW.'/layout');
define('_CLIENT',   _VIEW.'/client');
define('_ERROR',    _VIEW.'/errors');
require_once(CONFIG);

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
			/*echo "<script type=\"text/javascript\">
						alert(\"ERROR: Ticket could not be opened. Please try again\");
						window.location.pathname = \"/\"
				</script>";*/
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
        $count_ticket = "SELECT status as name, COUNT(id) as value FROM ticket GROUP BY status;";
        $count_ticket = mysqli_query(conn(), $count_ticket);

        while($row = mysqli_fetch_assoc($count_ticket)){
            $rows[$row['name']] = $row['value'];
        }

        return $rows;
    }
}

$count_ticket   = new ClientTicket();
$num_ticket     = $count_ticket->count_ticket(1);

?>