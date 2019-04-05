<?php 

require_once 'bootstrap.php';

//direct to the login page
if (login()) {
  redirect('dashboard');
}
//end of code

require_once 'partials/_header.php';

 ?>




    <form class="form-signin" action="login_sql.php" method="post" enctype="multipart/form-data" > 
    	
<?php require_once 'partials/_message.php' ?>
  			
  					
  				
 	  
  <h1 class="h3 mb-3 font-weight-normal">User Login</h1>

  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

  <label for="inputPassword" class="sr-only">Password</label>

  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
  

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>

  <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Login</button>

<hr?>
 
  	<a href="signin.php">Register</a>

 				
	</div>


			</div>
      
</form>

<?php require_once 'partials/_footer.php'; ?>
