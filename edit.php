<?php
require_once 'bootstrap.php';
if (!login()) {
    notification('You have to login first.', 'danger');
    redirect('login');
}
if (isset($_GET['id'])) {
    # code...

    $id = (int)$_GET['id'];
    $query = 'SELECT id, email, photo FROM users WHERE id=:id';
    $stmt = $con->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $hh = $stmt->fetch();
}
require_once 'partials/_header.php';


// if ($id === 0) {
//     header('Location: index.php');
// }
?>




<?php require_once 'partials/_message.php'; ?>

<form class="form-signin" action="edit_sql.php" method="post" enctype="multipart/form-data" > 
  <div class="jumbotron bg-danger">


    <h1 class="h3 mb-3 font-weight-normal">User update form</h1>

    <label for="inputEmail" class="sr-only">Email address</label>


    <input type="email" value="<?php echo $hh['email']; ?>"name="email" id="inputEmail" class="form-control" required autofocus>
    <input type="hidden" value="<?php echo $hh['id'];?>" class="form-control" name="userid" required="Please fill up">

    <label for="inputPassword" class="sr-only">Password</label>

    <input type="password" name="password" id="inputPassword" class="form-control">
    
    <label for="inputPhoto" class="sr-only">Photo</label>

    <input type="file" name="photo" id="inputphoto" class="form-control"><br/>

    <img src="uploads/photo/<?php echo $hh['photo']; ?>" alt="something" width="50">

    <button class="btn btn-lg btn-primary btn-block" name="edit" type="submit">Update</button>
    
</div>

<a href="userlist.php">go back</a>
</form>


<?php require_once 'partials/_footer.php'; ?>



