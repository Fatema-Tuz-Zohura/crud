<?php 

require_once 'bootstrap.php';

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

$query = 'SELECT * FROM users ORDER BY id DESC';

$stmt = $con->query($query);
$stmt->execute();

$users = $stmt->fetchAll();

require_once 'partials/_header.php';

 ?>




<?php require_once 'partials/_message.php' ?>


<div class="container">
	<h1>User list</h1>
<a href="dashboard.php">Back</a>

	<table class="table table-bordered table-hover">

	<thead>
		
		<tr>
			
			<td>Id</td>
			<td>Email</td>
			<td>Photo</td>
			<td>Action</td>

		</tr>
	</thead>

	<tbody>

		<?php foreach ($users as $user): ?>
			<tr>
			
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td>
				<img src="../uploads/photo/<?php echo $user['photo']; ?>" alt="something" width="50">
			</td>

			<td>
				
		<a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-info">Edit</a>


<?php if ($_SESSION['id'] !== $user['id']): ?>


		<a href="delete.php?id=<?php echo $user['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');" >Delete</a>

	<?php endif; ?>
			</td>

		</tr>
	<?php endforeach;  ?>
	</tbody>


	
</table>


</div>


<?php require_once 'partials/_footer.php'; ?>

