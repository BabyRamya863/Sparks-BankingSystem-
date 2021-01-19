<!DOCTYPE html>
<html>
<head>
	<title>
		TRANSACTIONS
	</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="NavBar.css">
  <link rel="stylesheet" type="text/css" href="TABLE.css">
  <link rel="stylesheet" href="src/bootstrap.min.css">
    <script src="src/jquery.min.js"></script>
    <script src="src/popper.min.js"></script>
    <script src="src/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       

      .table {
    margin: 0 auto;
    width: 60%;
    background-color: white;
}
table th {
  font-size: 20px;
  color: white;
  letter-spacing: .0.5em;
  text-transform: uppercase;
  background-color:#ff6600;
}

table td {
  padding: .500em;
  text-align: center;
  color: black;
  font-size: 20px;
}
body{
 background-image:linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("src/img.jpeg");
    background-size:cover;
    height: 80vh;
    background-position: center center;
    background-attachment: fixed;
    background-repeat: no-repeat;
}
    </style>
</head>
<body>
	<div>
  <table class="table table-striped table-hoverstyle" style="margin-top:0.5%;text-align: center;">
    <thead >
    <tr style="background-color: #ff6600;">
      <th scope="col">SENDER</th>
      <th scope="col">RECIEVER</th>
      <th scope="col">AMOUNT</th>
      <th scope="col">TIME</th> 
    </tr>
    </thead>
    <tbody>
    <tr>
      <td data-label="SENDER"><?php echo $rows['SENDER'] ?></td>
      <td data-label="RECIEVER"><?php echo $rows['RECIEVER'] ?></td>
      <td data-label="AMOUNT"><?php echo $rows['AMOUNT'] ?></td>
      <td data-label="TIME"><?php echo $rows['SENT_ON'] ?></td>
    </tr>
  </tbody>
<?php
include 'NavBar.php';
$conn = new mysqli("localhost", "root", "", "spark");
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM transactions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["SENDER"]. "</td><td>" . $row["RECIEVER"]. "</td><td>" . $row["AMOUNT"]. "</td><td>" . $row["SENT_ON"]. 
    "</td></tr>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</table>
</div>
</body>
</html>