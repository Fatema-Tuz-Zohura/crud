<?php 

require_once 'vendor/autoload.php';


session_start();


$con = connect();

$message = $_SESSION['message'] ?? null;

$type = $_SESSION['type'] ?? null;

 ?>