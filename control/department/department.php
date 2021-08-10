<?php
require_once(CONFIG);
//require_once('../Core/conf.php');
class Department{
    function create_department(){
        //
    }

    function update_department(){
        //
    }

    //fetch relevant department for a client
    # TODO : USING SESSION AS THE ARGUMENTS
    function client_department(){
        $client_department = "SELECT id, name FROM department";
        $client_department = mysqli_query(conn(), $client_department);

        while($row = mysqli_fetch_assoc($client_department)){
            $rows[$row['id']] = $row['name'];
        }

        //return $this->$get_client_department = $rows;
        return $rows;
    }

    //fetch all department relevant to the branch
    function branch_department(){
        //
    }

    //fetch specific department
    function specific_department($id){
        $specific_department = "SELECT name FROM department WHERE id='$id'";
        $specific_department = mysqli_query(conn(), $specific_department);
        $department = mysqli_fetch_assoc($specific_department);

        return $department['name'];
    }
}

$department = new Department;
$fetch_department = new Department;

//print_r($client_department);
//var_dump($department->client_department());
?>