<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
 <link rel="stylesheet" href="src/bootstrap.min.css">
    <script src="src/jquery.min.js"></script>
    <script src="src/popper.min.js"></script>
    <script src="src/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="NavBar.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <style>
  
  td{
    text-align:center;
    color: white;
    font-size: 20px;
  }
  th{
        background:#ff6600;
        text-align:center;
      }
body{
 background-color: black;
}

</style>

</head>

<body>
  
  <div>
  <table  class="table  table-striped table-hoverstyle " style="margin-left:10%;width:50%;margin:5% auto;">
    <thead style="text-align:center;color: white;font-size: 20px;">
      <tr style="background:#ff6600;">
        <th scope="col">NAME</th>
        <th scope="col">EMAIL</th>
        <th scope="col">BALANCE</th>
      </tr>
    </thead>
    <tbody>
    <tr>
      <td data-label="ID"><?php echo $rows['id'] ?></td>
      <td data-label="NAME"><?php echo $rows['name'] ?></td>
      <td data-label="EMAIL"><?php echo $rows['email'] ?></td>
      <td data-label="BALANCE"><?php echo $rows['balance'] ?></td>
    </tr>
    
  
<?php
  
  $sender;
  $conn = new mysqli("localhost", "root", "", "spark");
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $id=$_GET["id"];
  $sql = "SELECT * FROM user_details WHERE id='$id'";
  $result = $conn->query($sql);
  $row = $result -> fetch_assoc();
  $sender=$row["id"]."_".$row["name"];
  //echo $sender;
  echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row["balance"]."</td></tr>";
  $conn->close();

?>
</table>
</div>
<form method="post" action="../transfer.php">
  <?php
    echo "<input type='text' name='sender' value=".$sender." style='visibility:hidden;width:0;'>";
  ?>
  <div  style="text-align: center;margin-top: 1%;">
  <input type="submit" name="submit" value="TRANSFER">
</div>
</form>
</body>
</html>
