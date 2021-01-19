<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	 <link rel="stylesheet" href="src/bootstrap.min.css">
    <script src="src/jquery.min.js"></script>
    <script src="src/popper.min.js"></script>
    <script src="src/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="NavBar.css">
    <link rel="stylesheet" type="text/css" href="TABLE.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      td a{
        color: black;
        text-decoration:none;

      }
      a:hover{
        text-decoration:none;
        color:black;
      }

    table {
    margin: 0 auto;
    width: 80%;
}
body{
 background-image:linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url("src/img.jpeg");
    background-size:cover;
    height: 80vh;
    background-position: center center;
    background-attachment: fixed;
    background-repeat: no-repeat;
}

</style>

      


</head>

<body >
    
  <table>
  
  <thead>
    <tr>
      <th scope="col">ID</th>
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
  </tbody>
    
  
 
  

       

        
 <?php
// Create connection
 include 'NavBar.php';
$conn = new mysqli("localhost", "root", "", "spark");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM user_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"]. 
    "</td><td><a href='specific_user.php/?id=".$row["id"]."'/>" . $row["name"]. 
    "</td><td><a href='specific_user.php/?id=".$row["id"]."'/>". $row["email"]. 
    "</td><td><a href='specific_user.php/?id=".$row["id"]."'/>". $row["balance"]. 
    "</td></tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?> 
<div>
    <h2 style="text-align:center;color:white">User Details</h2>
  </div>

</table>

</body>
</html>