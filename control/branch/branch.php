<?php
class Branch{
    function create_branch(){
        
    }

    //fetch all registered branches
    function fetch_branches(){
        $fetch_branches = "SELECT * FROM branch";
        $fetch_branches = mysqli_query(conn(), $fetch_branches);

        while ($row = mysqli_fetch_assoc($fetch_branches)){
            $rows[$row['id']] = array(
                "id"        => $row['id'],
                "name"      => $row['name'],
                "code"      => $row['code'],
                "phone"     => $row['phone'],
                "email"     => $row['email'],
                "ePass"     => $row['pass'],
                "imap"      => $row['imap'],
                "website"   => $row['website'],
                "location"  => $row['location'],
                "country"   => $row['country'],
				"smtp"		=> $row['smtp']
            );
        }
		return $rows;
    }
}

$fetch_branches = new Branch();
?>