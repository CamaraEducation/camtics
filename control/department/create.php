<?php
$name     = $_POST['name'];
$branch   = $_POST['branch'];
$descript = $_POST['description'];

$create_Department  = new Department;
$create_Department  -> create_department($name, $branch, $descript);
?>