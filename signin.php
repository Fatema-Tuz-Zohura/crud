    
<?php 
require_once 'bootstrap.php';


//direct to the login page
if (login()) {
  redirect('dashboard');
}
//end of code


require_once 'partials/_header.php';

?>



<?php require_once 'partials/_message.php'; ?>


<form class="form-signin" action="signin_sql.php" method="post" enctype="multipart/form-data" > 
  <div class="jumbotron bg-danger">


    <h1 class="h3 mb-3 font-weight-normal">User Registration</h1>

    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>

    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <label for="inputPhoto" class="sr-only">Photo</label>

    <input type="file" name="photo" id="inputphoto" class="form-control"><br/>

    <button class="btn btn-lg btn-primary btn-block" name="register" type="submit">Register</button>

  </div>

  <hr/>

  <p>
    <a href="login.php">login</a>
  </p>

</form>
<?php require_once 'partials/_footer.php'; ?>
