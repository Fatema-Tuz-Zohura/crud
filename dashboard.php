<?php

require_once 'bootstrap.php';

//direct to the login page
if (!login()) {

	notification('you have to login first.', 'danger');

	redirect('login');
}
//end of code

require_once 'partials/_header.php';
?>

<?php require_once 'partials/_message.php' ?>


<div class="container">
	<div class="alert alert-info">

		you have been logged in as, <?php echo $_SESSION['email']; ?>
		
	</div>

	<p>

		<a href="update_profile.php">Update Profile</a>
	</p>

	<?php if ($_SESSION['role'] == 'admin'): ?>

		<p><a href="userlist.php">Users List</a></p>


	<?php endif; ?>


	<p>

		<a href="logout.php">Logout</a>
	</p>

	<?php require_once 'partials/_footer.php'; ?>