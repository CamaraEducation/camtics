<?php

    // connection to the Dabtabase
    function conn(){
        $server = "localhost";
        $user = "user";
        $dbname = "desk";
        $password = "1234";
        $conn = new mysqli($server, $user, $password, $dbname);
        ini_set("max_execution_time", 0);

        if($conn->connect_error){
            die('database connection could not be established');
            //include(_ERROR.'db.html')
            
        }
        return $conn;
    }

    //get all configurations
    function config(){
        $conf = "SELECT `name`, `value` FROM `configs`";
        $conf = mysqli_query(conn(), $conf);
        //$rows = mysqli_fetch_all($conf, MYSQLI_NUM);

        while($row = mysqli_fetch_assoc($conf)){
            $rows[$row['name']] = $row['value'];
        }

        return $rows;
    }
    $config = config();

?>