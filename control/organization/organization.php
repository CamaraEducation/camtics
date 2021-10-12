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
        $org  = $sql['id'];
        if($org < 1){ $org = 0; }
        return $org;
    }

    public static function user_org($id){
        if($id==''){
            $org = "SELECT name FROM organization WHERE id='$id'";
            $org = mysqli_query(conn(), $org);
            $org = mysqli_fetch_assoc($org);
            $org = $org['name'];
        }else{
            $id = BRANCH;
            $org = "SELECT name FROM branch WHERE id='$id'";
            $org = mysqli_query(conn(), $org);
            $org = mysqli_fetch_assoc($org);
            $org = $org['name'];
        }
        return $org;
    }
}
?>