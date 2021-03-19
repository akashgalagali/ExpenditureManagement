<?php 
require('./connect.php');
if(!empty($_COOKIE["email"]) || !empty($_COOKIE["user"])){
$users = "SELECT seva FROM seva";
$usersExec = mysqli_query($mysql, $users);
$sevaname = "SELECT * FROM expend order by date";
$sevanameExec = mysqli_query($mysql, $sevaname);
$total = "SELECT * FROM expend";
$totalExec = mysqli_query($mysql, $total);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard||Expenditure</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="icon" href="rs.png" />

</head>
<body>
    <div class="container" style="margin-top:5%;">
        <div style="display: flex;justify-content: space-between; margin-bottom: 5px;">
            <div style="margin-left: 5px;">
            <h4>Total Expenditure:<?php $k=0; while($total = mysqli_fetch_array($totalExec, MYSQLI_ASSOC)){ $amount = $total["amount"]; $k=$k+$amount;}
            echo"$k";
            ?></h4></div>
            <div style="margin-right: 5px;"><a href="addevent.php"><button type="submit" class="btn btn-success">Add Expenditure</button></a> </div>
        </div>
             
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Particular</th>
            <th scope="col">Amount</th>
            <th scope="col">Mode of payment</th>
          </tr>
        </thead>
        <tbody>
        <?php 
                              $i = 1;$k=0;
                              while($sevaname = mysqli_fetch_array($sevanameExec, MYSQLI_ASSOC)){
								$date = $sevaname["date"];
                                $par=$sevaname["particular"];

                                $amount = $sevaname["amount"];
                                $mode=$sevaname["mode"];
                                $k=$k+$amount;
                                ?>
								<tr>
								  <td><?php echo $i ?></td>
                                  <td><?php echo $date ?></td>
                                  <td><?php echo $par ?></td>

								  <td><?php echo $amount?> </td>
                                  <td><?php echo $mode ?></td>
                                </tr>
								
								<?php $i++; } ?>
				   
        </tbody>
      </table>
      <div style="margin-right: 5px;text-align:center;"><a href="logout.php"><button type="submit" class="btn btn-dark">Logout</button></a> </div>
   
    </div>
</body>
</html>
<?php } 
else {
  header("Location: login.php");
} ?>