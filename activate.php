<?php 

require_once 'bootstrap.php';

$token = $_GET['token'] ?? null;

if ($token === null || empty($token) ) {

	redirect('signin');


}

$query = 'SELECT id FROM users WHERE email_verification_token = :token';


$stmt = $con -> prepare($query);
$stmt ->bindParam(':token', $token);
$stmt ->execute();
$user = $stmt->fetch();


if ($stmt->rowCount()=== 1) {

	$id =(int)$user['id'];

	$query = "UPDATE users SET email_verification_token = '', email_verified = 1 WHERE id = '$id'";

	$stmt = $con->query($query);

	$stmt ->execute();



	notification('Your account activated.you can login now.Thank you.');

	redirect('login');

}

notification('invalid token.Thank you.');

redirect('signin');


?>
