<?php

require('./connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  
  $name = trim(stripslashes(mysqli_real_escape_string($mysql, $name)));
  $email = trim(stripslashes(mysqli_real_escape_string($mysql, $email)));
  $password = md5(trim(stripslashes(mysqli_real_escape_string($mysql, $password))));
  
 
  $emailcheckQuery = "SELECT id FROM users WHERE email='$email'";
  $emailCheckQueryExec = mysqli_query($mysql, $emailcheckQuery);
  $emailCount = mysqli_num_rows($emailCheckQueryExec);
  if($emailCount > 0){
    session_start();
    unset($_SESSION["success_message"]);
    $_SESSION["error_message"] = "Email  already exist";
  
  } else {
    $insertQuery = "INSERT INTO users (id, name, email, password) VALUES(NULL, '$name', '$email', '$password')";
    $insertQueryExec = mysqli_query($mysql, $insertQuery);
    if($insertQueryExec){
      session_start();
      unset($_SESSION["error_message"]);
      $_SESSION["success_message"] = "Registred successfully";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenditure||Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="rs.png" />
  </head>
<body>
    
    <div  style="margin-left: 40%; margin-top: 15%;">
        
        <div class="card" style="width: 18rem;">
            
            <div class="card-body">

<form action="" method="POST">
<?php
       if(!empty($_SESSION["error_message"])){
          ?>
         
       
        <script>
        alert("Email already exists");
        </script>
   
     <?php } ?>
    
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" id="name"  name="name"placeholder="Enter Name">
       
      </div>
  <div class="form-group">
    <label >Email address</label>
    <input type="email" class="form-control" id="email"  name="email" placeholder="Enter email">
   
  </div>
  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control" name="password"id="Password" placeholder="Password">
  </div>
 
  <button type="submit" class="btn btn-success">Register</button>
</form>
</div>
</div>
</div>
</body>
</html>