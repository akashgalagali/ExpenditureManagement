<?php
require('./connect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $date = $_POST["date"];
  $par = $_POST["par"];
  $amount = $_POST["amount"];
  $mode=$_POST["mode"];
  
  $date = trim(stripslashes(mysqli_real_escape_string($mysql, $date)));
  $par = trim(stripslashes(mysqli_real_escape_string($mysql, $par)));
 
  $mode = trim(stripslashes(mysqli_real_escape_string($mysql, $mode)));
 
  
    $insertQuery = "INSERT INTO expend (id, date, particular,amount,mode) VALUES(NULL, '$date', '$par', '$amount','$mode')";
    $insertQueryExec = mysqli_query($mysql, $insertQuery);
    if($insertQueryExec){
      session_start();
      unset($_SESSION["error_message"]);
      $_SESSION["success_message"] = "added successfully";
    }
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expenditure||Add Expenditure</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="rs.png" />
</head>
<body>
    
    <div style="margin-left: 40%; margin-top: 10%;">
        
        <div class="card" style="width: 18rem;">
            
            <div class="card-body">

<form action="" method="POST">
    <div class="form-group">
        <label >Date</label>
        <input type="date" class="form-control" id="date"  name="date"aria-describedby="emailHelp" >
       
      </div>
  <div class="form-group">
    <label >Particular</label>
    <input type="text" class="form-control" id="par"  name="par" placeholder="Particular">
   
  </div>
  <div class="form-group">
    <label >Amount</label>
    <input type="number" class="form-control" name="amount" id="amount" placeholder="amount">
  </div>
  <div class="form-group">
    <label >Mode of Payment</label>
    <select class="form-control" name="mode" id="mode">
        <option value="PhonePe">PhonePe</option>
        <option value="Cash">Cash</option>
             </select>
  </div>
  <button type="submit" class="btn btn-success">Add</button>
</form>
</div>
</div>
</div>
</body>
</html>