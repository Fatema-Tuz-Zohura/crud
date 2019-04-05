<?php 

require_once 'bootstrap.php';

$id = (int)trim($_GET['id']);


//direct to the login page
if (!login()) {
	notification('you have to login first.', 'danger');
	redirect('login');
}
//end of code

if (!is_admin()) {
	notification('you are not authorized.', 'danger');
	redirect('dashboard');

}

if ($id === 0) {
	redirect('signin');
	exit();
}

//for admin deletion
if ($_SESSION['id'] == $id) {

	redirect('dashboard');
	# code...
}

//end of the code


$query = 'DELETE FROM users WHERE id=:id';


$stmt = $con -> prepare($query);
$stmt ->bindParam(':id', $id, PDO::PARAM_INT);
$stmt ->execute();

redirect('userlist');




?>