<?php 

require_once 'bootstrap.php';
unset($_SESSION['id'], $_SESSION['email'], $_SESSION['role']);


notification('you have been logged out');

redirect('login');


 ?>