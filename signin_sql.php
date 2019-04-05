<?php
require_once 'bootstrap.php';

if (isset($_POST['register'])) {
  
  if (!empty($_FILES['photo']['name'])) {
    $file = $_FILES['photo']['tmp_name'];
    $file_parts = explode('.', $_FILES['photo']['name']);
    $extension = end($file_parts);
    $filename = uniqid('photo_', true) .time() . '.' . $extension;
    $destination = '../uploads/photo/' .  $filename;
  //die($filename);
    move_uploaded_file($file, $destination);
  }

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
   

    $email  = trim($_POST['email']);
    $password  = trim($_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);
    
    try{

//sql query
      $query='INSERT INTO users (email,password,photo,email_verification_token) VALUES (:email,:password,:photo,:email_verification_token)';

//pdo sql execute
      $email_verification_token = sha1(time() . $email . $filename);
      $stmt = $con -> prepare($query);

      $stmt ->bindParam(':email', $email);

      $stmt ->bindParam(':password', $password);
      $stmt ->bindParam(':photo', $filename);

      $stmt ->bindParam(':email_verification_token', $email_verification_token);

      $stmt ->execute();

      $con ->lastInsertId();


      try{

//creating object
        $mail = new \PHPMailer\PHPMailer\PHPMailer();

  $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host  = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'a604109de9983f';                     // SMTP username
    $mail->Password   = '0ba8556e89c88d';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('no-reply@project1.fatema', 'SSb php 02');
    $mail->addAddress($email);     // 

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '[SSB02]verify your account';
    $mail->Body    = 'Assalamualikum,Dear user, please click the following link to activate your account:<br/>
    <a href = "http://project1.fatema/ss-02/activate.php?token=' .$email_verification_token.'"> http://project1.fatema/ss-02/activate.php?token='.$email_verification_token.'</a> ';

    
    $mail->send();

  }catch(Exception $e){


    notification('Your mail not send.Thank you.');

    redirect('login');
  }


  notification('Your Registration are done successfully.Thank you.');

  redirect('login');

}catch(Exception $e){

  notification($e -> getMessage(), 'danger');

  redirect('signin');
}
}
else{
  notification('Your Registration are failed.Thank you.');

  redirect('signin');
}
}
?>
