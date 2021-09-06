<?php
class Organization{
    public static function search(){
        if(isset($_REQUEST["term"])){
            // Prepare a select statement
            $term = $_REQUEST["term"];
            $term = mysqli_real_escape_string(conn(), $term);
            $sql = "SELECT * FROM organization WHERE name LIKE '$term%'";
            $sql = mysqli_query(conn(), $sql);
            $sql = mysqli_fetch_all($sql, MYSQLI_ASSOC);

            if(!empty($sql)){
                foreach($sql as $org){
                    echo "<option value='".$org['name']."'>".$org['category']."-".$org['ownership'].", ".$org['location']."</option>";
                }
            }else{
                echo "nothing found";
            }
        }
    }

    public static function find_org_id($name){
        $name = mysqli_real_escape_string(conn(), $name);
        $sql  = "SELECT id FROM organization WHERE name LIKE '%$name%'";
        $sql  = mysqli_query(conn(), $sql);
        $sql  = mysqli_fetch_assoc($sql);
        return $org  = $sql['id'];
    }
}
?>