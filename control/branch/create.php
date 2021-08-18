<?php
    $name    = $_POST['name'];
    $phone   = $_POST['phone'];
    $email   = $_POST['email'];
    $country = $_POST['country'];

    $create_branch = new Branch;
    $create_branch ->create_branch($name, $phone, $email, $country);
?>