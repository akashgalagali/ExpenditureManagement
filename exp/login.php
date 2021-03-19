<?php
require('./connect.php');
if(empty($_COOKIE["email"]) || empty($_COOKIE["user"])){
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  $email = $_POST["email"];
  $password = $_POST["password"];
  
  
  $email = trim(stripslashes(mysqli_real_escape_string($mysql, $email)));
  $password = md5(trim(stripslashes(mysqli_real_escape_string($mysql, $password))));
 
  $emailcheckQuery = "SELECT id FROM users WHERE email='$email' AND password='$password'";
  $emailCheckQueryExec = mysqli_query($mysql, $emailcheckQuery);
  $emailCount = mysqli_num_rows($emailCheckQueryExec);
  if($emailCount > 0){
    $userRow = mysqli_fetch_array($emailCheckQueryExec, MYSQLI_ASSOC);
    $userId = $userRow["id"];
    setcookie("user",$userId, time() + 60*60*24*30);
    setcookie("email",$email, time() + 60*60*24*30);
    header( 'Location: dashboard.php' );
  } else {
    echo"$password";
      session_start();
      $_SESSION["error_message"] = "Invalid Email/Password";
    }
  }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenditure||Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="rs.png" />
</head>
<body>
<div class="container">
<form form action=""method ="POST">
<?php
       if(!empty($_SESSION["error_message"])){
          ?>
         
       
        <script>
        alert("invalid mail/Password");
        </script>
   
     <?php } ?>
  
<div class="form-group" >
    <label >Email address</label>
    <input type="email" class="form-control" id="Email"  name="email" placeholder="Enter email">
   
  </div>
  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control" name="password"  placeholder="Password">
  </div>
 
  <button type="submit" class="btn btn-success">Login</button>
</form>
</div>
</body>
</html>
<?php } else {
  header("Location: login.php");
} ?>