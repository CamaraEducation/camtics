<?php
    ini_set('error_reporting', E_ALL ^ E_WARNING);

    // connection to the Dabtabase
    function conn(){
        $server = "localhost";
        $user = "root";
        $dbname = "desk";
        $password = "";
        $conn = new mysqli($server, $user, $password, $dbname);
        ini_set("max_execution_time", 0);

        if($conn->connect_error){
            die('database connection could not be established');            
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

    function include_V($filePath, $variables = array(), $print = true){
        $output = NULL;
        if(file_exists($filePath)){
            // Extract the variables to a local namespace
            extract($variables);

            // Start output buffering
            ob_start();

            // Include the template file
            include $filePath;

            // End buffering and return its contents
            $output = ob_get_clean();
        }
        if ($print) {
            print $output;
        }
        return $output;

    }

?>