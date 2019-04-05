<?php


if (!function_exists('connect')) {

	function connect(){


$con = null;


try{
   $con = new PDO('mysql:dbname=ss_php_02; host =127.0.0.1', 'root', '');

$con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  
}catch(Exception $e){



}

return $con;
	}
	
}





if (!function_exists('login')) {

	function login(){

		return isset($_SESSION['id'], $_SESSION['email'], $_SESSION['role']);
	}
	
}

if (!function_exists('is_admin')) {

	function is_admin(){

		return $_SESSION['role'] == 'admin';
	}
	# code...
}


if (!function_exists('redirect')) {

	function redirect($location = '/'){

	header('Location: ' .$location.'.php');
	exit();
	}

	
}


if (!function_exists('notification')) {
    function notification($message, $type = 'success')
    {
        $_SESSION['message'] = $message;
        $_SESSION['type'] = $type;
    }
}

?>