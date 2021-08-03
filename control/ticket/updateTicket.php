<?php
include('ticket.php');

$department = $_POST['department'];
$urgency    = $_POST['urgency'];
$subject    = $_POST['subject'];
$message    = $_POST['message'];
$file       = $_POST['file'];

$create_ticket = new Ticket();
$create_ticket -> create_tickets($department, $urgency, $subject, $message);
?>