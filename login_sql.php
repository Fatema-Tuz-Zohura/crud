<?php

require_once 'bootstrap.php';

//direct to the login page
if (login()) {
  redirect('dashboard');
}
//end of code


if (isset($_POST['login'])) {

	$email = trim($_POST['email']);
	$password = trim($_POST['password']);




	$query = 'SELECT id,email,password,role,email_verified FROM users WHERE email=:email';


//email exit or not

	$stmt = $con->prepare($query);
	$stmt->bindParam(':email', $email);
	$stmt->execute();

	$user = $stmt->fetch();

//password varify

	if ($user) {

		if (password_verify($password, $user['password']) === true) {


			if ((int)$user['email_verified'] === 0) {
				notification('Verify your email.', 'danger');
				redirect('login');
			}    

			notification('login successful,thank u.');


			$_SESSION['id'] = $user['id'];
			$_SESSION['email'] = $user['email'];
			$_SESSION['role'] = $user['role'];



			redirect('dashboard');

		}else{

			notification('try again.', 'danger');
			redirect('login');
		}
	} else{

		notification('Invalid');
		redirect('login');
	}
}
?>